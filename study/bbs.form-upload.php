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
                height: 300,
                callbacks: {
                    onImageUpload: function (files, editor, welEditable) {
                        for (var i = files.length - 1; i >= 0; i--) {
                            sendFile(files[i], this);
                        }
                    }
                }
            });

            function sendFile(file,editor,welEditable)  {
                data = new FormData();
                //append() 태그를 어떠한  태그안으로 넣어주는 기능
                //먹을대상.append(먹힐대상);
                data.append("uploadFile", file);
                $.ajax({
                    data : data,
                    type : "POST",
                    url: '../yogi/bbs.upload.php',
                    enctype: 'multipart/form-data',
                    cache : false,
                    contentType : false,
                    processData : false,
                    success: function(data){
                        $(editor).summernote('insertImage',  data);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }
        });
      </script>
	  <div class="text-center mt-3">
		<input type="submit" name="submit" value="저 장">
        <input type="button" value="취 소" onclick="history.back()">
    </div>
  </form>
<!---- yogi/bbs.form.php 끝 ---->

