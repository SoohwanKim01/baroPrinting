<div id="autosave_wrapper write_div">
    <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input full_input required" size="50" maxlength="255" placeholder="제목">
    <?php if ($is_member) { // 임시 저장된 글 기능 ?>
        <script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
    <?php if($editor_content_js) echo $editor_content_js; ?>
        <button type="button" id="btn_autosave" class="btn_frmline">임시 저장된 글 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
        <div id="autosave_pop">
            <strong>임시 저장된 글 목록</strong>
            <ul></ul>
            <div><button type="button" class="autosave_close">닫기</button></div>
        </div>
    <?php } ?>
</div>