//jshint esversion:6

const express = require("express");
const bodyParser = require("body-parser");
const request = require("request");

const app = express();

app.use(bodyParser.urlencoded({extended: true}));
app.use(express.static('bitcoin-ticker'));
app.get("/syles.css", function(req, res){
  res.sendFile(__dirname + "/"+"syles.css");
});

app.get("/giphy.gif", function(req, res){
  res.sendFile(__dirname + "/"+"giphy.gif");
});

app.get("/", function(req, res){
  res.sendFile(__dirname + "/index.html");
});

app.post("/", function(req,res){
  var crypto = req.body.crypto;
  var fiat = req.body.fiat;
  //console.log(crypto);
  request("https://apiv2.bitcoinaverage.com/indices/global/ticker/"+crypto+fiat, function(error, response, body){
    var data = JSON.parse(body);
    var price = data.last;

//res.sendFile(__dirname + "/"+"syles.css");
    res.send("<html><head><link rel='stylesheet' href='syles.css'></head><body><h1 class ='class1'>The current price of "+crypto+" is "+price+fiat+"</h1></body></html>");

  });
});

app.listen(3000, function(){
  console.log("Server is running on port 3000");
});
