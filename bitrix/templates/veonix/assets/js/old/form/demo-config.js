$(function(){
  /*
   * For the sake keeping the code clean and the examples simple this file
   * contains only the plugin configuration & callbacks.
   * 
   * UI functions ui_* can be located in: demo-ui.js
   */
  $('#drag-and-drop-zone').dmUploader({ //
    url: '/form/backend/upload.php',
    maxFileSize: 100000000, // 100 Megs 
    extFilter: ["jpg", "jpeg", "png", "gif", "pdf", "svg", "svg", "doc", "docs", "docx", "svg", "mov", "mp4"],
    auto: true,
    onDragEnter: function(){
      // Happens when dragging something over the DnD area
      this.addClass('active');
    },
    onDragLeave: function(){
      // Happens when dragging something OUT of the DnD area
      this.removeClass('active');
    },
    onInit: function(){
      // Plugin is ready to use
      ui_add_log('Penguin initialized :)', 'info');
    },
    onComplete: function(){
      // All files in the queue are processed (success or error)
      ui_add_log('All pending tranfers finished');
      console.log( $(".fileUrl").val());
      
          console.log($(".upload_form").serialize());
          // $.ajax({
          //   type: "POST",
          //   url: "../../send-form.php?fileUpd",
          //   data: $(".upload_form").serialize(),
          //   success: function (data) {
          //     console.log("ушло");
          //     $.fancybox.open('<div class="message"><p class="message_1">Заявка отправлена!</p><p class="message_2">Наш менеджер свяжется с Вами <br> в ближайшее время</p></div>'); 
          //     ym(49319551,'reachGoal','SEND_FORM');
          //    $('[type="submit"]').prop("disabled", false);;
              
          //   },
          //   error: function (jqXHR, text, error) {
                
          //       $.fancybox.open('<div class="message"><h2>'+ text + error + '</h2></div>'); 
          //   }
          // });
    },
    onNewFile: function(id, file){
      // When a new file is added using the file selector or the DnD area
      ui_add_log('New file added #' + id);
      ui_multi_add_file(id, file);
    },
    onBeforeUpload: function(id){
      // about tho start uploading a file
      ui_add_log('Starting the upload of #' + id);
      ui_multi_update_file_status(id, 'uploading', 'Загрузка...');
      ui_multi_update_file_progress(id, 0, '', true);
    },
    onUploadCanceled: function(id) {
      // Happens when a file is directly canceled by the user.
      ui_multi_update_file_status(id, 'warning', 'Canceled by User');
      ui_multi_update_file_progress(id, 0, 'warning', false);
    },
    onUploadProgress: function(id, percent){
      // Updating file progress
      ui_multi_update_file_progress(id, percent);
    },
    onUploadSuccess: function(id, data){
      // A file was successfully uploaded
      ui_add_log('Server Response for file #' + id + ': ' + JSON.stringify(data));
      ui_add_log('Upload of file #' + id + ' COMPLETED', 'success');
      ui_multi_update_file_status(id, 'success', 'Загружено');
      ui_multi_update_file_progress(id, 100, 'success', false);
    },
    onUploadError: function(id, xhr, status, message){
      ui_multi_update_file_status(id, 'danger', message);
      ui_multi_update_file_progress(id, 0, 'danger', false);  
    },
    onFallbackMode: function(){
      // When the browser doesn't support this plugin :(
      ui_add_log('Plugin cant be used here, running Fallback callback', 'danger');
    },
    onFileSizeError: function(file){
      Fancybox.show([{
        type: "html",
        src: '<div class="message" style=" width: 300px; text-align: center; padding: 20px; "><p>Максимальный размер 100 мб</p></div>'
      }]); 
       ui_add_log('File \'' + file.name + '\' cannot be added: size excess limit', 'danger');
    },
    onFileTypeError: function(){
      Fancybox.show([{
        type: "html",
        src: '<div class="message" style=" width: 300px; text-align: center; padding: 20px; "><p>Недопустимый формат файла</p></div>'
      }]); 
     },
    onFileExtError: function(){
      Fancybox.show([{
        type: "html",
        src: '<div class="message" style=" width: 300px; text-align: center; padding: 20px; "><p>Недопустимый формат файла</p></div>'
      }]); 
 
    }
  });
});