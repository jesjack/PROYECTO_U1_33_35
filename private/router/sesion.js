const express = require('express')
const mysql = require('mysql')
const MySQL = require('../js/mysql')

const router = express.Router()

router.get('/iniciar', (req, res, next) => {
  res.render('sesion.php', {
    action: 'iniciar'
  })
})
router.get('/registrar', (req, res, next) => {
  res.render('sesion.php', {
    action: 'registrar'
  })
})
router.post('/registrar', (req, res, next) => {

  var inserts = [req.body['user'], req.body['name'], req.body['mail'], req.body['tell'], req.body['pass']]
  var sql = mysql.format("INSERT INTO usuarios VALUES (?, ?, ?, ?, ?)", inserts)

  console.log(sql)

  MySQL(sql, (error, results, fields) => {
    if(error) res.send('Ocurrio un error al registrar')
    else {
      req.session['user'] = req.body['user']
      res.redirect('/')
    }
  })
})

module.exports = router