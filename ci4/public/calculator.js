$(document).ready(function(){
    $("#main").attr("readonly","readonly");
    const buttons = $(":button");
    var firstNum = null;
    var secondNum = null;
    var operator = null;
    var returnData = 0;
    var answer;
    var displayValue = $("#main").val();

    $.ajax({
        url: 'calculate/getSession', 
        type: "POST",
        dataType: 'JSON',
        success: function(data){
            returnData = data;
            firstNum = returnData.num1;
            secondNum = returnData.num2;
            operator = returnData.operator;

            if (operator == null || operator == "") {
                $("#main").val(firstNum);
            }
            else {
                $("#main").val(secondNum);
                $(".function").attr("disabled",true);
                if (operator == "+") {
                    $("#add").css("background-color","lightgreen");
                }
                else if (operator == "-") {
                    $("#subtract").css("background-color","lightgreen");
                }
                else if (operator == "*") {
                    $("#multiply").css("background-color","lightgreen");
                }
                else if (operator == "/") {
                    $("#divide").css("background-color","lightgreen");
                }
            }
            console.log("Loaded Session");
            console.log(data);
        }
    });

    buttons.click(function(e) {
        console.log(e.target.value);
        var button = e.target.value;
        //Any operations button
        if (button == "+" || button == "/" || button == "*" || button == "-") {
            if (firstNum != $("#main").val() && firstNum == null) {
                firstNum = $("#main").val();
            }
            $("#main").val(null);
            operator = button;
            $(e.target).css("background-color", "lightgreen");
            $(".function").attr("disabled",true); 
              
        }
        else if (button == "(-)") {
            $("#main").val( "-" + $("#main").val() );
            if (operator == null || operator == "") {
                if (firstNum == null) {
                    $("#main").val("-");
                    firstNum = "-";
                }
                else {
                    firstNum = -firstNum;
                }
            }
            else {
                if (secondNum == null) {
                    secondNum =  "-";
                }
                else {
                    secondNum = -secondNum;
                }
            }
        }
        else if (button == "%"){
            currentNum = parseFloat($("#main").val());
            currentNum *= .01;
            console.log(currentNum);
            $("#main").val( currentNum );
            if (operator == "" || operator == null) {
                firstNum = currentNum;
            }
            else {
                secondNum = currentNum;
            }
        }
        //Equals button
        else if (button == "=") {
            //secondNum = $("#main").val();
            //converts strings to floats
            firstNum = parseFloat(firstNum);
            secondNum = parseFloat(secondNum);
            $(".function").attr("disabled",false);
            $(".function").css("background-color","orange");
            //sends data to server to be calculated
            $.ajax({
                url: 'calculate/calculate', 
                type: "POST",
                data: {firstNum: firstNum, secondNum: secondNum, operator: operator},
                dataType: 'JSON',
                success: function(data){
                    returnData = data;
                    $("#main").val( (returnData.answer));
                    firstNum = returnData.answer;
                }
            });
            //firstNum = $("#main").val();
            secondNum = null;
            operator = null;
        }
        //Clear button
        else if (button == "clear") {
            $("#main").val(null);
            firstNum = null;
            secondNum = null;
            operator = null;
            $(".function").attr("disabled",false);
            $(".function").css("background-color","orange");
        }
        //Number button
        else {
            $("#main").val( $("#main").val() + e.target.value );
            //Adds Value to firstNum if its blank
            if (operator == null || operator == "") {
                if (firstNum == null) {
                    firstNum = e.target.value;
                }
                else {
                   firstNum += e.target.value; 
                }
            }
            //If operator is assigned, then value is added to secondNum for the calculation
            else if (operator != null && operator != "") {
                if (secondNum == null) {
                    secondNum = e.target.value;
                }
                else {
                    secondNum += e.target.value;
                }
            }
        }
        //console.log("FirstNum = " + firstNum + " SecondNum = " + secondNum + " Operator = " + operator);
        //Sends data to server to be stored as session data
        setTimeout(function() {
        $.ajax({
            url: 'calculate/saveSession', 
            type: "POST",
            data: {firstNum: firstNum, secondNum: secondNum, operator: operator},
            dataType: 'JSON',
            success: function(data){
                console.log('Data saved');
                console.log(data);                
            }
        }); 
        console.log('Saved');   
    }, 1000);
          
    });
    

});