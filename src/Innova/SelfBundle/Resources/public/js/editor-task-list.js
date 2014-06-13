$(function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
});

$( "body" ).on( "click", '.delete-task', function() {
    $("#questionnaire-id").val($(this).data("questionnaire-id"));
    $('#delete-task-modal').modal('show');
});

$( "body" ).on( "click", '#save-order', function() {
    saveOrder();
});

$( "body" ).on( "click", '#delete-task-confirmation', function() {
    deleteTask();
});

function saveOrder(){
    var newOrder = new Array();
    var testId = "";
    $('.questionnaire').each(function() {
        testId = $(this).data("test-id");
        newOrder.push($(this).data("questionnaire-id"));
    });
    newOrder = JSON.stringify(newOrder);

    $.ajax({
        url: Routing.generate('save-order-test-questionnaire'),
        type: 'POST',
        dataType: 'json',
        data: 
        { 
            testId: testId,
            newOrder: newOrder
        }
    })
    .done(function(data) {
        console.log("Ordre sauvegardé");
    });
}

function deleteTask(){
    var testId = $("#test-id").val();
    var questionnaireId = $("#questionnaire-id").val();

    $.ajax({
        url: Routing.generate('delete-task'),
        type: 'POST',
        dataType: 'json',
        data: 
        { 
            testId: testId,
            questionnaireId: questionnaireId
        }
    })
    .done(function(data) {
        console.log("Tâche supprimée");
        $("#task-"+questionnaireId).remove();
        saveOrder();
        $('#delete-task-modal').modal('hide');
    });
}