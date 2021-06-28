let mysql = require('mysql');

let connection = mysql.createConnection({
    host: 'medella.chle4yzdrgqk.us-east-2.rds.amazonaws.com',
    user: 'admin',
    password: 'Medella123!',
    database: 'Medella'
});

connection.connect(function(err) {
    if (err) {
      return console.error('error: ' + err.message);
    }
  
    console.log('Connected to the MySQL server.');
});