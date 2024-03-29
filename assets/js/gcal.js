/*!
 * FullCalendar v2.3.0 Google Calendar Plugin
 * Docs & License: http://arshaw.com/fullcalendar/
 * (c) 2013 Adam Shaw
 */ (function (factory) {
	if (typeof define === "function" && define.amd) {
		define(["jquery"], factory);
	} else {
		factory(jQuery);
	}
})(function ($) {
	var API_BASE = "https://www.googleapis.com/calendar/v3/calendars";
	var fc = $.fullCalendar;
	var applyAll = fc.applyAll;
	fc.sourceNormalizers.push(function (sourceOptions) {
		var googleCalendarId = sourceOptions.googleCalendarId;
		var url = sourceOptions.url;
		var match;
		if (!googleCalendarId && url) {
			if (
				(match = /^[^\/]+@([^\/\.]+\.)*(google|googlemail|gmail)\.com$/.test(
					url
				))
			) {
				googleCalendarId = url;
			} else if (
				(match =
					/^https:\/\/www.googleapis.com\/calendar\/v3\/calendars\/([^\/]*)/.exec(
						url
					)) ||
				(match = /^https?:\/\/www.google.com\/calendar\/feeds\/([^\/]*)/.exec(
					url
				))
			) {
				googleCalendarId = decodeURIComponent(match[1]);
			}
			if (googleCalendarId) {
				sourceOptions.googleCalendarId = googleCalendarId;
			}
		}
		if (googleCalendarId) {
			if (sourceOptions.editable == null) {
				sourceOptions.editable = false;
			}
			sourceOptions.url = googleCalendarId;
		}
	});
	fc.sourceFetchers.push(function (sourceOptions, start, end, timezone) {
		if (sourceOptions.googleCalendarId) {
			return transformOptions(sourceOptions, start, end, timezone, this);
		}
	});
	function transformOptions(sourceOptions, start, end, timezone, calendar) {
		var url =
			API_BASE +
			"/" +
			encodeURIComponent(sourceOptions.googleCalendarId) +
			"/events?callback=?";
		var apiKey =
			sourceOptions.googleCalendarApiKey ||
			calendar.options.googleCalendarApiKey;
		var success = sourceOptions.success;
		var data;
		var timezoneArg;
		function reportError(message, apiErrorObjs) {
			var errorObjs = apiErrorObjs || [{ message: message }];
			var consoleObj = window.console;
			var consoleWarnFunc = consoleObj
				? consoleObj.warn || consoleObj.log
				: null;
			(sourceOptions.googleCalendarError || $.noop).apply(calendar, errorObjs);
			(calendar.options.googleCalendarError || $.noop).apply(
				calendar,
				errorObjs
			);
			if (consoleWarnFunc) {
				consoleWarnFunc.apply(consoleObj, [message].concat(apiErrorObjs || []));
			}
		}
		if (!apiKey) {
			reportError(
				"Specify a googleCalendarApiKey. See http://fullcalendar.io/docs/google_calendar/"
			);
			return {};
		}
		if (!start.hasZone()) {
			start = start.clone().utc().add(-1, "day");
		}
		if (!end.hasZone()) {
			end = end.clone().utc().add(1, "day");
		}
		if (timezone && timezone != "local") {
			timezoneArg = timezone.replace(" ", "_");
		}
		data = $.extend({}, sourceOptions.data || {}, {
			key: apiKey,
			timeMin: start.format(),
			timeMax: end.format(),
			timeZone: timezoneArg,
			singleEvents: true,
			maxResults: 9999,
		});
		return $.extend({}, sourceOptions, {
			googleCalendarId: null,
			url: url,
			data: data,
			startParam: false,
			endParam: false,
			timezoneParam: false,
			success: function (data) {
				var events = [];
				var successArgs;
				var successRes;
				if (data.error) {
					reportError(
						"Google Calendar API: " + data.error.message,
						data.error.errors
					);
				} else if (data.items) {
					$.each(data.items, function (i, entry) {
						var url = entry.htmlLink;
						if (timezoneArg) {
							url = injectQsComponent(url, "ctz=" + timezoneArg);
						}
						events.push({
							id: entry.id,
							title: entry.summary,
							start: entry.start.dateTime || entry.start.date,
							end: entry.end.dateTime || entry.end.date,
							url: url,
							location: entry.location,
							description: entry.description,
						});
					});
					successArgs = [events].concat(
						Array.prototype.slice.call(arguments, 1)
					);
					successRes = applyAll(success, this, successArgs);
					if ($.isArray(successRes)) {
						return successRes;
					}
				}
				return events;
			},
		});
	}
	function injectQsComponent(url, component) {
		return url.replace(/(\?.*?)?(#|$)/, function (whole, qs, hash) {
			return (qs ? qs + "&" : "?") + component + hash;
		});
	}
});
