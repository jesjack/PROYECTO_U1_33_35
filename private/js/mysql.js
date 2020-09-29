const mysql = require('mysql')
const fs = require('fs')
const db_data = require('../../database.json')

const connection = mysql.createConnection({
  host: db_data.host,
  user: db_data.user,
  password: db_data.password,
  database: 'proyecto_33_35',
  multipleStatements: true
})

function MySQL(sql, callback) {
  connection.connect(err => {
    if(err) callback(err)
    else {
      connection.query(sql, callback)
      connection.end()
    }
  })
}

MySQL.file = function(file, callback) {
  connection.connect(err => {
    if(err) callback(err)
    else {
      connection.query(fs.readFileSync(file).toString(), callback)
      connection.end()
    }
  })
}

MySQL.init = function(callback) {
  const conn = mysql.createConnection({
    host: db_data.host,
    user: db_data.user,
    password: db_data.password,
    multipleStatements: true
  })

  conn.connect(err => {
    if(err) callback(err)
    else {
      conn.query(fs.readFileSync(__dirname + '/../sql/proyecto_33_35.sql').toString(), callback)
      conn.end()
    }
  })
}

module.exports = MySQL;