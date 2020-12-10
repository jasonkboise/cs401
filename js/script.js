$(function() { //make sure the page is finished loading first

    //close bad messages
    $(".close_error").click(function() {
        $(this).parent(".bad").fadeOut(500);
    });
    
    //close good messages
    $(".close_error").click(function() {
        $(this).parent("#good").fadeOut(500);
    });

    //ajax for submiting a comment
    $("#comment_form").submit(function(e) {
        e.preventDefault();
        var comment = $("#comment").val();

        var div = document.getElementById("username"), username;
        username = div.getAttribute("username");

        var div2 = document.getElementById("guide_id"), guide_id;
        guide_id = div2.getAttribute("guide_id");

        if (comment) {
            if (comment.length > 256){
                $("#comment_form").after("<div class='bad'>Comment is too long, can be no longer than 256 characters.<span class='close_error'>X<span></div>");
                $(".close_error").click(function() {
                    $(this).parent(".bad").fadeOut(500);
                });
            }
            else {
                if($("#comment_table").length) {
                    $("#comment_table").prepend("<tr><td class='comment_td'>" + username +"</td><td class='comment_td'>" + comment + "</td><td class='comment_td'>Just now</td></tr>");
                }
                else {
                    $("#error_msg").replaceWith("<table id='comment_table'><thead><th class='comment_th'>User</th><th class='comment_th'>Comment</th><th class='comment_th'>Date</th></thead><tr><td class='comment_td'>" + username + "</td><td class='comment_td'>" + comment + "</td><td class='comment_td'>Just now</td></tr>");
                }
            }
        }
        else {
            $("#comment_form").after("<div class='bad'>Please add a comment.<span class='close_error'>X<span></div>");
            $(".close_error").click(function() {
                $(this).parent(".bad").fadeOut(500);
            });
        }

        $.ajax({
            type: "POST",
            url: "comment_handler.php",
            data: {comment:comment, guide_id:guide_id},
            success: function() {
            },
            error: function() {
                alert("FAILURE");
            }
        });

        //set comment text box back to empty after enter a comment.
        var comment = $("#comment").val("");
        
    });

    //testing email
    $("#Cemail").keyup(function() {
        var email = $(this).val();
        var regex = new RegExp("[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+");
        if(regex.test(email)) {
            $(this).removeClass("invalid");
            $(this).parent().find("span").removeClass("error_show").addClass("small_error");
        } 
        else {
            $(this).addClass("invalid");
            $(this).parent().find("span").removeClass("small_error").addClass("error_show");
        }
    });

    //testing username
    $("#Cusername").keyup(function() {
        var username = $(this).val();
        var regex = new RegExp("^[a-zA-Z0-9_]{3,15}$");
        if(regex.test(username)) {
            $(this).removeClass("invalid");
            $(this).parent().find("span").removeClass("error_show").addClass("small_error");
        } 
        else {
            $(this).addClass("invalid");
            $(this).parent().find("span").removeClass("small_error").addClass("error_show");
        }
    });

    
});
