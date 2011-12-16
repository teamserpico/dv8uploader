    /**
    * On DOMReady initialize page functionality
    */
    $(document).ready(function(){
     
    //Add functionality into the menu buttons
    prepareMenu();
    });
     
    /**
    * Prepares the menu buttons for selecting
    * filetypes
    * @return NULL
    */
    function prepareMenu()
    {
    $("#menu li").click(
    function () {
    $("#menu li").each(
    function(){
    $(this).removeClass("active");
    }
    );
    $(this).addClass("active");
    HideFiles($(this).children().html());
    return false;
    });
     
    //Select the first as default
    $("#menu li:first").click();
    }
     
    /**
    * Shows only the selected filetypes
    * @param selector
    * @return bool
    */
    function HideFiles(selector)
    {
    //show all files
    if(selector === "All files")
    {
    $("#files > li").show();
    return true;
    }
    else
    {
    //show only the selected filetype
    $("#files > li").hide();
    $("#files > li." + selector).show();
    return true;
    }
    }