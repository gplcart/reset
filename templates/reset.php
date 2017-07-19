<?php
/**
 * @package Reset
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */
?>
<form method="post" class="form-horizontal">
  <input type="hidden" name="token" value="<?php echo $_token; ?>">
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="alert alert-danger">
        <?php echo $this->text('WARNING! By submitting this form you permanently delete the database tables and config files created during previous installation. This action CANNOT be undone!'); ?>
      </div>
      <div class="form-group required<?php echo $this->error('confirm', ' has-error'); ?>">
        <label class="col-md-2 control-label"><?php echo $this->text('Confirm'); ?></label>
        <div class="col-md-4">
          <input name="reset[confirm]" class="form-control" value="<?php echo isset($reset['confirm']) ? $this->e($reset['confirm']) : ''; ?>">
          <div class="help-block">
            <?php echo $this->error('confirm'); ?>
            <div class="text-muted"><?php echo $this->text('Type in the name of <a href="@url">the site</a> to confirm', array('@url' => $this->url('admin/settings/store/edit/1'))); ?></div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-md-4 col-md-offset-2">
          <div class="btn-toolbar">
            <button class="btn btn-default save" name="submit" value="1"><?php echo $this->text('Reset'); ?></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>