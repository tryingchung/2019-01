
            
    	$(document).ready(function() {
    		$("#div-personal").hide();
    		$("#div-mypaper").hide();
    		$("#div-help").hide();
    		$("#div-about").hide();
    		$("#div-paperlist").hide();
    		$("#div-other").hide();
//=================================================================================
		
    	
    		//显示首页
    		
    		$("#mytitle").click(function(){
                $("#div-personal").hide();
                // $("#div-mypaper").hide();
                // $("#div-help").hide();
                // $("#div-about").hide();
                $("#div-paperlist").hide();
                $("#div-other").hide();

                $("#default-index").show();
            });
    		$("#li-default").click(function(){
                $("#div-personal").hide();
                // $("#div-mypaper").hide();
                // $("#div-help").hide();
                // $("#div-about").hide();
                $("#div-paperlist").hide();
                $("#div-other").hide();

                $("#default-index").show();
            });

//=================================================================================
    		// 显示个人中心——我的账号
    		$("#li-personal").click(function showMyMsg() {
                // $("#div-mypaper").hide();
                // $("#div-help").hide();
                // $("#div-about").hide();
                $("#div-paperlist").hide();
                $("#div-other").hide();
                $("#default-index").hide();

                $("#div-personal").show();
        });
//=================================================================================
    		// 显示个人中心——我的问卷
    		
    		// $("#li-mypaper").click(function showMypaper() {
      //           $("#div-personal").hide();
      //           $("#div-help").hide();
      //           $("#div-about").hide();
      //           $("#div-other").hide();
      //           $("#default-index").hide();
      //           $("#div-paperlist").hide();

      //           $("#div-mypaper").show();
      //       });
//=================================================================================
    		// 显示个人中心——帮助
    		// $("#li-help").click(function() {
    		// 	$("#div-personal").hide();
	    	// 	$("#div-mypaper").hide();
	    	// 	$("#div-help").show();
	    	// 	$("#div-about").hide();
	    	// 	$("#div-other").hide();
    		// 	$("#default-index").hide();
    		// 	$("#div-paperlist").hide();
    		// });
//=================================================================================
    		// 显示个人中心——关于
    		// $("#li-about").click(function() {
    		// 	$("#div-personal").hide();
	    	// 	$("#div-mypaper").hide();
	    	// 	$("#div-help").hide();
	    	// 	$("#div-about").show();
	    	// 	$("#div-other").hide();
    		// 	$("#default-index").hide();
    		// 	$("#div-paperlist").hide();
    		// });
//=================================================================================
    		// 显示调查中心
    		$("#li-paperlist").click(function showPaperlist() {
                $("#div-personal").hide();
                // $("#div-mypaper").hide();
                // $("#div-help").hide();
                // $("#div-about").hide();
                $("#div-other").hide();
                $("#default-index").hide();
                $("#div-paperlist").show();
        });
    		$("#a-paperlist").click(function showPaperlist() {
                $("#div-personal").hide();
                // $("#div-mypaper").hide();
                // $("#div-help").hide();
                // $("#div-about").hide();
                $("#div-other").hide();
                $("#default-index").hide();
                $("#div-paperlist").show();
        });
//=================================================================================
    		// 显示其他
    		$("#li-other").click(function() {
    			$("#div-personal").hide();
	    		// $("#div-mypaper").hide();
	    		// $("#div-help").hide();
	    		// $("#div-about").hide();
	    		$("#div-other").show();
    			$("#default-index").hide();
    			$("#div-paperlist").hide();
    		});
    	});
//=================================================================================

    // </script>