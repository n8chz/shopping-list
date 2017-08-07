/*    
        @licstart  The following is the entire license notice for the 
        JavaScript code in this page.

        Copyright (C) 2014  Astounding Team

        The JavaScript code in this page is free software: you can
        redistribute it and/or modify it under the terms of the GNU
        General Public License (GNU GPL) as published by the Free Software
        Foundation, either version 3 of the License, or (at your option)
        any later version.  The code is distributed WITHOUT ANY WARRANTY;
        without even the implied warranty of MERCHANTABILITY or FITNESS
        FOR A PARTICULAR PURPOSE.  See the GNU GPL for more details.

        As additional permission under GNU GPL version 3 section 7, you
        may distribute non-source (e.g., minimized or compacted) forms of
        that code without the copy of the GNU GPL normally required by
        section 4, provided you include this license notice and a URL
        through which recipients can access the Corresponding Source.   


        @licend  The above is the entire license notice
        for the JavaScript code in this page.
*/

function del(clickEvent) {
 let id = $(this).data("shoplist-id");
 $.post({
   url: "./del.php",
   data: {id: id},
   success: function () {
    let button = $(`[data-shoplist-id=${id}]`);
    console.log(`button: ${button.get(0).outerHTML}`);
    button.parent().remove();
   }
 });
}

$(function () {
  // console.log("checking in");
  $("#new").focus();
  // using keyup b/c change doesn't fire unless tab loses and regains focus
  // why is that, btw?
  $("#new").keyup(function (keyEvent) {
    let partial = $("#new").val();
    let whichKey = keyEvent.which;
    // if enter, up arrow or down arrow was pressed,
    // intent is to select a match,
    // not to send a new string for matching
    if (whichKey == 13 || whichKey == 38 || whichKey == 40) {
     return;
    }
    // make ajax request for items
    // for which value of #new input is a substring
    $.get({
      url: "./match.php",
      dataType: "json",
      // text to look for in list items:
      data: {partial: partial},
      success: function (matches) {
       // kludge to help firefox keep up with changes
       // $("#new").removeAttr("list");
       // clear the deck from previous inputs 
       $("#matches").empty();
       let option;
       // create an <option> for each search result,
       // and append to <datalist id="matches">
       for (let match of matches) {
        option = $("<option>");
        option.attr("value", match.description);
        $("#matches").append(option);
        // console.log($("#matches").get(0).outerHTML);
       }
       // other end of kludge
       // $("#new").attr("list", "matches");
      }
    });
  });
  $("#add").click(function () {
    let description = $("#new").val();
    // console.log(`description: ${description}`);
    $.post({
      url: "./add.php",
      data: {description: description},
      success: function (id) {
       let item = $("<div>").addClass("item");
       let button = $("<button>").addClass("delete");
       button.attr("data-shoplist-id", id.trim()).text("x").click(del);
       item.append(button);
       item.append($("<span>").text(description));
       $("#items").append(item);
      }
    });
  });
  $(".delete").click(del);
});

