// VARIABLES
var regions = ["NCR", "I", "CAR", "II", "III", "IV-A", "IV-B", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII", "XIII", "ARMM"];

// WHEN THE DOCUMENT IS FULLY LOADED
$(document).ready(function() {

    // Initiates the tool tips.
    $('[adminDiv="LGU"]').tooltipster({
        theme: 'tooltipster-borderless',
        contentAsHTML: true,
        distance: -15,
        trigger: 'click',
        contentCloning: true,
        animation: 'grow'
    });

    // Gets all the Local Government Units in the Region
    let LGU = $("[adminDiv=LGU]");

    // ITERATE THROUGH THE MUNICIPALITIES/CITIES
    for (let i = 0; i < $(LGU).length; i++) {
        // VARIABLES
        let obj = $(LGU)[i];
        // TOOLTIP INFO DISPLAY VARS
        let IDprovince = "N/A", IDregion = "N/A", IDcity = "N/A", caseNo = 0;

        ////////////////
        // AJAX START //
        ////////////////
        let str = ($(obj).attr('data-name'));
        if (str.includes(" "))
            str = str.replace(" ","_");
        else
            str = str + "";
        // console.log(($(obj).attr('data-name')).replace(" ","_"));
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: "lib/js/heatmap.ajax.php", // contains the PHP code needed to fetch the data.
            data: {
                paramRegion: $(obj).parent().parent().attr('id'),
                paramCity: str
            },
            success: function(response) {
                // SETS THE NUMBER OF CASES IN THE AREA
                for (let j = 0; j < response.length; j++) {
                    caseNo = response[j].IDcount;
                    IDcity = response[j].IDcity;
                    IDprovince = response[j].IDprovince;
                    IDregion = response[j].IDregion;
                }
                // SETS THE COLOR OF THE MAP
			    // Number of cases in the area. Defines what color the area should be.
			    if (caseNo < 1)
			        console.log("THEY'RE AT PEACE");
			    else if (caseNo < 10)
			        $(obj).addClass("manageable");
			    else if (caseNo < 100)
			        $(obj).addClass("moderate");
			    else if (caseNo < 1000)
			        $(obj).addClass("worst");
			    else
			        $(obj).addClass("dead");
			    
			    // IF THE LGU IS CLICKED
			    // Shows the tool tip information when clicked.
			    $(obj).click(function() {
			        // REPLACES THE OLD VALUES TO THE NEW ONE.
			        $(".IDcity").text($(obj).attr("data-name"));             // NAME OF CITY (I.E. MANILA)
			        $(".IDprovince").text("Metropolitan Manila");            // PROVINCE NAME (I.E. METROPOLITAN MANILA)
			        $(".IDregion").text("National Capita Region (NCR)");     // REGION OF THE SUBJECT (I.E. NCR)
			        $(".IDcases").text(caseNo);                              // NUMBER OF CASES/CURRENT REPORTS (INTEGER)
			    });
			    // TOOLTIP - ON HOVER
			    $(obj).on("mouseover", function(event) {
			        $(this).on("mousemove", function(event) {
			            $(".svg-tooltip").addClass("svg-tooltip-active");
			            $(".svg-tooltip").css({
			                "left": event.pageX + 7.5,
			                "top": event.pageY + 12.5,
			                "content": $(obj).attr("data-name")
			            });
			            $(".svg-tooltip-active").html($(obj).attr("data-name"));
			        });
			    });
			    // TOOLTIP - ON LEAVE
			    $(obj).on("mouseleave", function(event) {
			        $(".svg-tooltip").removeClass("svg-tooltip-active");
			    });
            },
            error: function(xhr, stat, err) {
                console.log("ERROR: " + err + "\nSTATUS: " + stat + "\nXHR: " + xhr.responseText);
            }
        });
        //////////////
        // AJAX END //
        //////////////
    }
});