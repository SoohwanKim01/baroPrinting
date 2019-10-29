<!---- yogi/bbs.form.php 시작 ---->
<?php
if (!defined('YOGI')) exit ; // 개별 페이지 접근 불가
  if ($edit_mode == true) {
    echo '<h4>자료수정</h4>';
  }
?>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . $mode ; ?>">
 	  <div class="mb-2">
        <div class="input-group">
          <label for="subject" class="input-group-prepend">
            <span class="input-group-text">제 목</span>
          </label>
		  <input type="text" name="subject" class="form-control" id="subject"
          <?php if($edit_mode==true) echo "value='$subject'"; ?> autocomplete=off autofocus required>
		</div>
 	  </div>
  	  <label for="content" class="sr-only">내 용:</label>
      <textarea  id="summernote"  name="content" class="form-control" rows="10"><?php if($edit_mode==true) echo $content; ?> 
      </textarea>
      <script> 
        $(document).ready(function() {
            $('#summernote').summernote({
                lang: 'ko-KR' ,
                fontNames: ['맑은 고딕', '굴림', '바탕', 'Segoe UI', 'Arial'] ,
                height: 300 ,
                maximumImageFileSize: 524288, // 512KB
                callbacks: {
                    onImageUploadError: function(msg) {
                        alert('선택한 그림파일이 너무 큽니다. 512K 이하 파일로 선택해 주세요.');
                    }
                },
            });
        });
      </script>
	  <div class="text-center mt-3">
		<input type="submit" name="submit" value="저 장">
        <input type="button" value="취 소" onclick="history.back()">
    </div>
  </form>
<!---- yogi/bbs.form.php 끝 ---->

