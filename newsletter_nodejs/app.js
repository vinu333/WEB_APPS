//jshint esversion:6

const express = require("express");
const bodyParser = require("body-parser");
const request = require("request");

const app = express();

app.use(express.static("public"));
app.use(bodyParser.urlencoded({extended: true}));

app.get("/", function(req,res){
  res.sendFile(__dirname + "/index.html");
});

app.post("/", function(req,res){

  var firstName = req.body.fname;
  var lastName = req.body.lname;
  var email = req.body.email;

  //console.log(firstName);

  var data = {
    members: [
      {email_address:email,
        status:"subscribed"
      }
    ]
  };

var jsonData = JSON.stringify(data);

  var options = {
    url: "https://us4.api.mailchimp.com/3.0/lists/5a239e0323",
    method: "POST",
    headers: {
      "Authorization": "vinu 71418fde010d86f7477128107dcd640a-us4"
    },
    body: jsonData
  };

  request(options, function(error, response, body){
if (error){
  res.sendFile(__dirname + "/failure.html");
}
else{
  res.sendFile(__dirname + "/success.html");
}

});
});

app.listen(3000, function(){
  console.log("server is running on port 3000");
});

//71418fde010d86f7477128107dcd640a-us4
//5a239e0323
