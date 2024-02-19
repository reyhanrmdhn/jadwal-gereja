<div class="row">
    <?php foreach ($rows as $row) : ?>
        <?php
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
                    <input type="text" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "text_2") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="text" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "text_full") : ?>
            <div class="col-sm-12 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="text" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "icon") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="text" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?>, <a href="https://fontawesome.com/search?o=r&m=free" target="_blank">(Show List Icon Here)</a></span>
                </div>
            </div>
        <?php elseif ($rowtype == "password") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="password" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "email") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="email" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "colorPicker") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="text" class="form-control m-input <?= $rowtype ?>" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "date") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="date" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "dateRange") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type='text' class="form-control" id="m_daterangepicker_1" name="<?= $rowname ?>" readonly placeholder="Select time" type="text" />
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "year") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="text" class="form-control m-input year" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "url") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="url" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "description" || $rowtype == "description_2") : ?>
            <div class="col-sm-12 mb-4" id="article">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <textarea class="form-control m-input description" rows="9" name="<?= $rowname ?>"><?= set_value($rowname) ?></textarea>
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
                            <option value="<?= $v->id; ?>"><?= $v->text; ?></option>
                        <?php endforeach ?>

                    </select>
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "selectLocation") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label> &nbsp;<i class="loader fa fa-spinner fa-spin"></i>
                    <select class="form-control m-input select2bs <?= $row[2] ?>" id="<?= $rowname ?>" name="<?= $rowname ?>" required="">
                        <option value="">SELECT</option>
                    </select>
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "googleMaps") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <div class="content" id="googleMaps" style="height: 250px;position: relative; border-radius:3px;overflow: hidden;"></div>
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                    <input type="text" class="form-control m-input" id="coordinates" readonly placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <input type="hidden" id="latitude">
                    <input type="hidden" id="longitude">
                </div>
            </div>
        <?php elseif ($rowtype == "selectImage") : ?>
            <div class="col-sm-12 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <?php
                    $value = $row[2];
                    ?>
                    <select class="form-control m-input selectImage" id="<?= $rowname ?>" name="<?= $rowname ?>" multiple="multiple">
                        <?php foreach ($value as $v) : ?>
                            <option value="<?= $v->id; ?>" data-src="<?= $v->image ?>"><?= $v->text; ?></option>
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
                    ?>
                    <label><?= $label ?></label>
                    <select class="form-control m-input multipleSelect" id="<?= $rowname ?>" name="<?= $rowname ?>" multiple="multiple">
                        <?php foreach ($value as $v) : ?>
                            <option value="<?= $v->id; ?>"><?= $v->text; ?></option>
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
                    ?>
                    <label><?= $label ?></label>
                    <select class="form-control m-input serverside" id="<?= str_replace("[]", "", $rowname) ?>" name="<?= $rowname ?>" multiple="multiple">

                    </select>
                    <span class="m-form__help">Insert <?= $label ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "textarea") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <textarea class="form-control m-input" rows="3" name="<?= $rowname ?>"><?= set_value($rowname) ?></textarea>
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "number") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="number" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help"><?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "rating") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group row">
                    <label class="col-12 text-left"><?= $rowtitle ?></label>
                    <div class="rating ml-2">
                        <input type="radio" id="star5" name="<?= $rowname ?>" value="5">
                        <label for="star5"></label>
                        <input type="radio" id="star4" name="<?= $rowname ?>" value="4">
                        <label for="star4"></label>
                        <input type="radio" id="star3" name="<?= $rowname ?>" value="3">
                        <label for="star3"></label>
                        <input type="radio" id="star2" name="<?= $rowname ?>" value="2">
                        <label for="star2"></label>
                        <input type="radio" id="star1" name="<?= $rowname ?>" value="1">
                        <label for="star1"></label>
                    </div>
                    <span class="m-form__help col-12">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "image") : ?>
            <?php
            // $size = '';
            // if (isset($row[2])) {
            //     $size = $row[2];
            // }
            ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label for=""><?= $rowtitle ?></label>
                    <input type="text" class="form-control m-input" readonly id="imageinput<?= $imagetype ?>" placeholder="Upload File" value="<?= set_value($rowname) ?>" name="<?= $rowname ?>">
                    <img src="<?= set_value($rowname) ?>" style="max-width: 38%;" id="imageBanner<?= $imagetype ?>"><br>
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
            <div class="col-sm-6 mb-4">
                <?php $imagetype++; ?>
                <div class="form-group m-form__group">
                    <label for=""><?= $rowtitle ?></label>
                    <input type="text" class="form-control m-input" readonly id="imageinput<?= $imagetype ?>" placeholder="Upload Video" value="<?= set_value($rowname) ?>" name="<?= $rowname ?>">
                    <span class="m-form__help"><?= $rowtitle ?></span><br>
                    <a href="<?php echo base_url() ?>assets/admin/vendors/custom/filemanager/dialog.php?type=0&akey=AcC3s5KeyUpl0ad1254281783Abd1ra&field_id=imageinput<?= $imagetype ?>" class="btn btn-primary m-btn m-btn--custom iframe-btn" style="margin-top: 10px;">Upload</a>
                </div>
            </div>
        <?php elseif ($rowtype == "documents") : ?>
            <div class="col-sm-6 mb-4">
                <?php $imagetype++; ?>
                <div class="form-group m-form__group">
                    <label for=""><?= $rowtitle ?></label>
                    <input type="text" class="form-control m-input" readonly id="imageinput<?= $imagetype ?>" placeholder="Upload Documents" value="<?= set_value($rowname) ?>" name="<?= $rowname ?>">
                    <span class="m-form__help"><?= $rowtitle ?></span><br>
                    <a href="<?php echo base_url() ?>assets/admin/vendors/custom/filemanager/dialog.php?type=0&akey=AcC3s5KeyUpl0ad1254281783Abd1ra&field_id=imageinput<?= $imagetype ?>" class="btn btn-primary m-btn m-btn--custom iframe-btn" style="margin-top: 10px;">Upload</a>
                </div>
            </div>
        <?php elseif ($rowtype == "time") : ?>
            <div class="col-sm-6 mb-4">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="time" class="form-control m-input" placeholder="Enter <?= $rowtitle ?>" name="<?= $rowname ?>" id="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php elseif ($rowtype == "text_custom_placeholder") :
            $placeholder = $row[2];
        ?>
            <div class="col-sm-6 mb-4" id="video_url">
                <div class="form-group m-form__group">
                    <label><?= $rowtitle ?></label>
                    <input type="text" class="form-control m-input" id="<?= $rowname ?>" placeholder="Enter <?= $placeholder ?>" name="<?= $rowname ?>" value="<?= set_value($rowname) ?>">
                    <span class="m-form__help">Insert <?= $rowtitle ?></span>
                </div>
            </div>
        <?php else : ?>
        <?php endif; ?>
    <?php endforeach; ?>
</div>