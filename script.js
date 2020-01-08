
function resetMe() {

  var target = $("#container");
  target.html('');
}
function printConfs(confs) {

  resetMe();

  var target = $("#container");

  var template = $("#box-template").html();
  var compiled = Handlebars.compile(template);

  for (var i=0;i<confs.length;i++) {

    var conf = confs[i];
    var confHTML = compiled(conf);

    target.append(confHTML);
  }
}

function getConfs() {

  $.ajax({

    url: "todoToday.php",
    method: "GET",
    success: function(data) {

      console.log("data", data);
      printConfs(data);
    },
    error: function(error) {

      console.log("error", error);
    }
  });
}


function init() {

  getConfs();

}

$(window).ready(init);
