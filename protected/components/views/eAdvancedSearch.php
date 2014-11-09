<?php $firstKey = key($this->criteria); ?>

<div id="<?php echo $this->id; ?>" data-target="<?php echo $this->target; ?>" style="margin-top:10px; <?php echo $this->hide ? 'display:none;' : ''; ?>">
	<div style="margin-bottom:10px;">
		<span class="<?php echo $this->cssClass['advancedSearchTextSpan']; ?>"></span><?php echo $this->labels['advancedSearch']; ?>
	</div>
    <form id="<?php echo $this->id . '-form'; ?>">
        <table>
            <tr>
                <td>
                    <select class="as-select <?php echo $this->cssClass['select']; ?>" data-model-name="<?php echo $this->getModelName(); ?>">
                        <?php foreach ($this->criteria as $key => $val): ?>
                            <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input class="as-input <?php echo $this->cssClass['input']; ?>" type="text" name="<?php echo $this->getModelName() . '[' . $firstKey . ']'; ?>"/>
                </td>
                <td>
                    <a class="as-plus <?php echo $this->cssClass['add']; ?>" style="margin-left:5px;" href="javascript:void(0);"><?php echo $this->labels['add']; ?></a>
                    <a class="as-remove <?php echo $this->cssClass['remove']; ?>" href="javascript:void(0);"><?php echo $this->labels['remove']; ?></a>
                </td>
            </tr>
            <tr id="<?php echo $this->id . '-as-list-footer'; ?>" class="as-list-footer" style="display:none;"></tr>
        </table>
		<div class="as-submit-container" style="margin-top:5px;">
			<input class="as-btn-submit <?php echo $this->cssClass['submit']; ?>" type="submit" value="<?php echo $this->labels['submit']; ?>"/>
		</div>
    </form>
</div>