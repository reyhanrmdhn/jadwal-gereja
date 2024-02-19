<div class="row">
    <?php foreach ($rows as $row) : ?>
        <?php
        if ($row == null) : ?>
            <div class="col-sm-6 mb-4"></div>
        <?php else :
            $rowname = $row[0];
            $rowtype = $row[1];
            $rowtitle = ucwords(str_replace("[]", " ", $row[0]));
            $rowtitle = ucwords(str_replace("_", " ", $rowtitle));
            $rowtitle = ucwords(str_replace("Id ", " ", $rowtitle));
        ?>

            <?php if ($rowtype == "text") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="text" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "text_2") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="text" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "text_full") : ?>
                <div class="col-sm-12 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="text" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "icon") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="text" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?>, <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">(Show List Icon Here)</a></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "password") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="password" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "password_confirm") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="password" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "email") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="email" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "edit_email") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="email" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "colorPicker") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="text" class="form-control m-input <?= $rowtype ?>" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" value="<?= $page->$rowname ?>" <?php if ($page->$rowname) { ?> style="background-color: <?= $page->$rowname ?>;" <?php } ?>>
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "url") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="url" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "date") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="date" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "dateRange") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type='text' class="form-control" id="m_daterangepicker_1" name="<?= $rowname ?>" readonly placeholder="Select time" type="text" value="<?= $row[2] ?>" />
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "year") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="text" class="form-control m-input year" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "select") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <?php
                        $value = $row[2];
                        ?>
                        <select class="form-control m-input select2bs" id="<?= $rowname ?>" name="<?= $rowname ?>" required="">
                            <?php foreach ($value as $v) : ?>
                                <option <?= ($v->id == $page->$rowname) ? 'selected' : '' ?> value="<?= $v->id; ?>"><?= $v->text; ?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "multipleselect") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <?php
                        $value = $row[2];
                        $label = $row[3];
                        $in_array_value = $row[4];
                        ?>
                        <label><?= $label ?></label>
                        <select class="form-control m-input multipleSelect" id="<?= $rowname ?>" name="<?= $rowname ?>" multiple="multiple">
                            <?php foreach ($value as $v) : ?>
                                <option <?= (in_array($v->id, $in_array_value)) ? 'selected' : '' ?> value="<?= $v->id; ?>"><?= $v->text; ?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="m-form__help">Insert <?= $label ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "multipleselectServerSide") : ?>
                <div class="col-sm-6 mb-4" id="form_<?= str_replace("[]", "", $rowname) ?>">
                    <div class="form-group m-form__group">
                        <?php
                        $label = $row[2];
                        $values = $row[3];
                        ?>
                        <label><?= $label ?></label>
                        <select class="form-control m-input serverside" id="<?= str_replace("[]", "", $rowname) ?>" name="<?= $rowname ?>" multiple="multiple">
                            <?php foreach ($values as $v) : ?>
                                <option selected="selected" value="<?= $v->id; ?>"><?= $v->text; ?></option>
                            <?php endforeach ?>
                        </select>
                        <span class="m-form__help">Insert <?= $label ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "description" || $rowtype == "description_2") : ?>
                <div class="col-sm-12 mb-4" id="article">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <textarea class="form-control m-input description" rows="9" name="<?= $rowname ?>"><?= $page->$rowname ?></textarea>
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "description_short") : ?>
                <div class="col-sm-6 mb-4" id="article">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <textarea class="form-control m-input description" rows="9" name="<?= $rowname ?>"><?= $page->$rowname ?></textarea>
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "textarea") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <textarea class="form-control m-input" rows="3" name="<?= $rowname ?>"><?= $page->$rowname ?></textarea>
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "rating") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group row">
                        <label class="col-12 text-left"><?= $rowtitle ?></label>
                        <div class="rating ml-2">
                            <input type="radio" id="star5" name="<?= $rowname ?>" value="5" <?php if ($page->rating == 5) echo 'checked'; ?>>
                            <label for="star5"></label>
                            <input type="radio" id="star4" name="<?= $rowname ?>" value="4" <?php if ($page->rating == 4) echo 'checked'; ?>>
                            <label for="star4"></label>
                            <input type="radio" id="star3" name="<?= $rowname ?>" value="3" <?php if ($page->rating == 3) echo 'checked'; ?>>
                            <label for="star3"></label>
                            <input type="radio" id="star2" name="<?= $rowname ?>" value="2" <?php if ($page->rating == 2) echo 'checked'; ?>>
                            <label for="star2"></label>
                            <input type="radio" id="star1" name="<?= $rowname ?>" value="1" <?php if ($page->rating == 1) echo 'checked'; ?>>
                            <label for="star1"></label>
                        </div>
                        <span class="m-form__help col-12">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "image") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label for=""><?= $rowtitle ?></label>
                        <input type="text" class="form-control m-input" readonly id="imageinput<?= $imagetype ?>" placeholder="Upload File" value="<?= $page->$rowname ?>" name="<?= $rowname ?>">
                        <img src="<?= $page->$rowname ?>" style="max-width: 38%;" id="imageBanner<?= $imagetype ?>"> <br>
                        <span class="m-form__help"><?= $rowtitle ?></span><br>
                        <a href="<?php echo base_url() ?>assets/admin/vendors/custom/filemanager/dialog.php?type=0&akey=AcC3s5KeyUpl0ad1254281783Abd1ra&field_id=imageinput<?= $imagetype ?>" class="btn btn-primary m-btn m-btn--custom iframe-btn" style="margin-top: 10px;">Upload</a>
                    </div>
                </div>
                <?php if (count($allrow) < 2) {
                    $imagetype = $imagetype + 1;
                } ?>
                <?php if (count($rows) > 1) {
                    $imagetype = $imagetype + 1;
                } ?>
            <?php elseif ($rowtype == "video") : ?>
                <div class="col-sm-6 mb-4" id="video">
                    <?php $imagetype++; ?>
                    <div class="form-group m-form__group">
                        <label for=""><?= $rowtitle ?></label>
                        <input type="text" class="form-control m-input" readonly id="imageinput<?= $imagetype ?>" placeholder="Upload Video" value="<?= $page->$rowname ?>" name="<?= $rowname ?>">
                        <span class="m-form__help"><?= $rowtitle ?></span><br>
                        <a href="<?php echo base_url() ?>assets/admin/assets/vendors/custom/filemanager/dialog.php?type=0&akey=AcC3s5KeyUpl0ad1254281783Abd1ra&field_id=imageinput<?= $imagetype ?>" class="btn btn-primary m-btn m-btn--custom iframe-btn" style="margin-top: 10px;">Upload</a>
                    </div>
                </div>
            <?php elseif ($rowtype == "documents") : ?>
                <div class="col-sm-6 mb-4">
                    <?php $imagetype++; ?>
                    <div class="form-group m-form__group">
                        <label for=""><?= $rowtitle ?></label>
                        <input type="text" class="form-control m-input" readonly id="imageinput<?= $imagetype ?>" placeholder="Upload Documents" value="<?= $page->$rowname ?>" name="<?= $rowname ?>">
                        <span class="m-form__help"><?= $rowtitle ?></span><br>
                        <a href="<?php echo base_url() ?>assets/admin/vendors/custom/filemanager/dialog.php?type=0&akey=AcC3s5KeyUpl0ad1254281783Abd1ra&field_id=imageinput<?= $imagetype ?>" class="btn btn-primary m-btn m-btn--custom iframe-btn" style="margin-top: 10px;">Upload</a>
                    </div>
                </div>
            <?php elseif ($rowtype == "number") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="number" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help"><?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "time") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="time" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    </div>
                </div>
            <?php elseif ($rowtype == "hourpicker") : ?>
                <div class="col-sm-6 mb-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group m-form__group">
                                <label>Jam Mulai</label>
                                <input type="text" class="form-control m-input hourpicker" placeholder="Masukkan Jam Mulai" name="start_hour" value="<?= $page->start_hour ?>">
                                <span class="m-form__help">Jam Mulai</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group m-form__group">
                                <label>Jam Selesai</label>
                                <input type="text" class="form-control m-input hourpicker" placeholder="Masukkan Jam Berakhir" name="end_hour" value="<?= $page->end_hour ?>">
                                <span class="m-form__help">Jam Selesai</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($rowtype == "text_custom_placeholder") :
                $placeholder = $row[2];
            ?>
                <div class="col-sm-6 mb-4" id="video_url">
                    <div class="form-group m-form__group">
                        <label><?= $rowtitle ?></label>
                        <input type="text" class="form-control m-input" id="<?= $rowname; ?>" placeholder="Enter <?= $placeholder ?>" name="<?= $rowname ?>" value="<?= $page->$rowname ?>">
                        <span class="m-form__help"><?= $rowtitle ?></span>
                    </div>
                </div>
            <?php else : ?>

            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>