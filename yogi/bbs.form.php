<!---- yogi/bbs.form.php 시작 ---->
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?mode=' . $mode ; ?>" class="mt-5">
 	  <div class="mb-2">
        <div class="input-group">
          <label for="subject" class="input-group-prepend">
            <span class="input-group-text">제 목</span>
          </label>
		  <input type="text" name="subject" class="form-control" id="subject"
          <?php if(substr($mode,0,4)=='edit') {echo "value=subject";} ?> autocomplete=off autofocus required>
		</div>
 	  </div>



		<label for="content" class="sr-only">내 용:</label>
        <textarea name="content" class="form-control" rows="10"><?php if(substr($mode,0,4)=='edit') {echo content;} ?>
        </textarea>





	  <div class="text-center mt-3">
		<input type="submit" name="submit" value="저 장" />
    <?php if(substr($mode,0,4)=='edit') {
        echo '<input type="submit" formaction="'.$_SERVER['PHP_SELF'].'" value="취소" />';
    } ?>

    </div>
  </form>
<!---- yogi/bbs.form.php 끝 ---->

