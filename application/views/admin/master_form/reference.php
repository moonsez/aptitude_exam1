<div class="portlet-body form">
    <form action="save_reference" id="reference_form" class="horizontal-form" method="post" enctype="multipart/form-data">
        <div class="form-body">                         
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">
                            Reference Name
                            <span class="required" aria-required="true">*</span>
                        </label>
                        <div class="input-icon right">
                            <i class="fa"></i>
                            <input type="text" id="reference_name" name="reference_name" class="form-control" placeholder="" tabindex="" >
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="fileinput fileinput-new form-group" data-provides="fileinput">
                        <label class="control-label">Reference Image</label>
                        <div class="">
                            <?php if(isset($single_reference->reference_image) && !empty($single_reference->reference_image)) 
                            {?>
                                <input type="hidden" value="<?php echo (isset($single_reference->reference_image) && !empty($single_reference->reference_image))?$single_reference->reference_image:''?>" name="hidden_reference_image">
                                <span class="btn default btn-file">
                                    <span class="fileinput-new">Change</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="reference_image" id="reference_image" class="reference_image" />
                                </span>
                                <span class="fileinput-filename"></span>
                                &nbsp;
                                <a href="javascript:void(0);" class="close fileinput-exists" data-dismiss="fileinput">
                                </a>
                                <?php $path = './uploads/test/'. $single_reference->reference_image; 
                                if(file_exists($path))
                                { ?>
                                    <span style="cursor: pointer;" class="tooltips viewlogo" rel="<?php echo base_url();?>uploads/test/<?php echo $single_reference->reference_image;?>" data-original-title="View Logo" data-placement="top">
                                        <i class="fa fa-picture-o"> </i>
                                    </span> 
                                <?php } 
                                else
                                {?>
                                    <span style="cursor: pointer;" class="tooltips viewlogo" rel="<?php echo base_url();?>uploads/test/no_image.jpg" data-original-title="View Logo" data-placement="top">
                                        <i class="fa fa-picture-o"> </i>
                                    </span>
                                <?php } ?>
                                <div id="reference_image_error"></div>
                            <?php }                                                  
                            else 
                            {?>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new">Upload</span>
                                    <span class="fileinput-exists">Change</span>
                                    <input type="file" name="reference_image" id="reference_image" value="" />
                                </span>
                                <span class="fileinput-filename"></span>
                                &nbsp;
                                <a href="javascript:void(0);" class="close fileinput-exists" data-dismiss="fileinput">
                                </a>
                                <div id="reference_image_error"></div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>           
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Reference Descreption 
                            <span class="required" aria-required="true">*</span>
                        </label>
                        <div>
                            <textarea class="ckeditor1 form-control" name="reference_desc" rows="6" data-error-container="#editor2_error"></textarea>
                            <div id="editor2_error">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>