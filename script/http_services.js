        scoreList();
            $("#tryLists").click(function () {
                scoreList();
            });
        function scoreList(){
            $.ajax({
                url:"action/action.php?scoreList",
                type:"GET",
                success:function(result) {
                    $("#scoreListTb").html(result);
                }
            });
        }


        $("#newScore").click(function(){
            var useridValue=document.getElementById('userid').value;
            var trueWordValue=document.getElementById('trueWordInput').value;
            var falseWordValue=document.getElementById('falseWordInput').value;
            var keystrokeValue=document.getElementById('keyupInput').value;
            var btnNewScore=document.getElementById('newScore');

$.post('action/action.php', 
    {
    newScore:"Insert",
     userid:useridValue,
     trueword:trueWordValue,
     falseword:falseWordValue,
     keystroke:keystrokeValue}, function(response){ 
      scoreList();
      btnNewScore.disabled="true";
        });     
    
});