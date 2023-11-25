function check_name(element) {
    let emp_name =element.value;
    let first_letter = emp_name.substring(0,1);
    if(isNaN(first_letter)) {
        document.getElementById("name_error").innerHTML=""
    }
    else {
        document.getElementById("name_error").innerHTML="The first letter of name cannot start with number"
    }
}



/*jQuerry(document).ready(
    function(){

    }

);
OR
$(document).ready(
    function(){

    }

);
OR*/
$(function(){

    $("#logout").click(function(){
        window.location.href = "logout.php";
    })

    error= false;
    $("#emp_id_error").hide();

    $('#mybutton').click(function(){
        $("#mydivid").text("This is my not my first, but second div");
        $("#mydivid").toggle();

        $('#div1').fadeIn();
        $('#div2').fadeIn('slow');
        $('#div3').fadeIn(3000);
    })
    $('#myform').submit(function(event){
        let emp_id = $("#emp_id").val();
        if (emp_id < 100) {
            $("#emp_id_error").show();
            error = true;
        } else {
            $("#emp_id_error").hide();
            error = false;
        }
        if (error) {
            event.preventDefault(); //preventDefault -> the default work is not done
            return false;
        }
    })
    $('#myform').keyup(function() {
        $('#emp_id_error').hide();
    })
});
/*
function fn1() {
    document.getElementById("mydivid").innerHTML = "This is my not my first, but second div";
    document.getElementById("bigbox").style.border = '12px blue solid';

    var x = 0.1 + 0.2; //Gives output as 0.30000000000000004 (common known error). To get proper result we can do (0.1*10 + 0.2*10)/10
    //var x = 16+4+ "Apple" + 16 + 4; //Computes until integer is present then just concatinates
    alert (x);
    let myarray = ["Saab","Volve","Bmw"];
    myarray.pop();
    myarray.push("Ferrari");
    let y = "hello sir".toUpperCase();
    let a ="How are you?";
    b=y.concat('. ',y,'. ',a);
    let myarray_str = myarray.toString();
    
    console.log(myarray_str);
    console.log(y);
    console.log(b);
}
*/
function fn_trycatch() {
    let mynumber = document.getElementById('mynumber').value;
    try{
        if (mynumber < 3) throw 'too low';
        if (mynumber > 8) throw 'too high';
    }
    catch(e){
        alert('Error message: The number is ' + e);
    }
    finally{
        document.getElementById('mynumber').value = '';
    }
}

//checkbox necessary
$("#submit").click(function() {
    if($('div.checkbox.group:checkbox:checked').length == 0){
        alert("You must check one checkbox");
    }
});

