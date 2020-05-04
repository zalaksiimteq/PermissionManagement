$('.pauseTimer').click(function() {
  var pause_user_id = $(this).attr('data-user-id');
  var pause_task_id = $(this).attr('data-task-id');
  $('#pause_user_id').val(pause_user_id);
  $('#pause_task_id').val(pause_task_id);
  $('#pauseModal').modal('show');
});

$('.stopTimer').click(function() {
  var stop_user_id = $(this).attr('data-user-id');
  var stop_task_id = $(this).attr('data-task-id');
  $('#stop_user_id').val(stop_user_id);
  $('#stop_task_id').val(stop_task_id);
  $('#stopModal').modal('show');
});
