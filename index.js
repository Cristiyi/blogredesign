// var cloudant = require('./models/cloudant');
var express = require('express');
var router = express.Router();
var app = express();
var Cloudant = require('cloudant');



var dbConfig = {

 //    account : "1291a590-cb67-4f54-bdcd-22b086c431ae-bluemix", 
	// password : "2f6d34b0cab4e76ac8c98e8137d09aa2fa0ae0e99057c5375e4a9448c88efe9e",
	// dbName : "wordpress"
	account:"ibmddm",
	password:"Cl0udant",
	dbName:"wordpress_management_prd"
   
};

var cloudant = Cloudant(dbConfig);
var db = cloudant.db.use(dbConfig.dbName);
app.set('cloudant', cloudant);
app.set('db', db);


app.get("/all", function(req, res) {

	var db = req.app.get('db');
	
	db.list(function(err, data) {
		if (err) {
			res.json({err:err});
			return;
		}
		
		res.json({data:data});
	});

});


app.use("/getid", function(req, res) {

	var db = req.app.get('db');
	
	var id = "business-transformation-news";
	if (id != "") {
		db.get(id, function(err, data) {
			if (err) {
				res.json({err:err});
				return;
			}

			res.json({data:data});
		});
	} else {
		res.json({err:"Please specify an id or _id to read"});
	}

})

app.listen(3000);