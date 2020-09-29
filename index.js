const express = require('express')
const php = require('php')
const path = require('path')
const morgan = require('morgan')
const fs = require('fs')
const bodyParser = require('body-parser')
const cookieParser = require('cookie-parser')
const session = require('express-session')
const MySQL = require('./private/js/mysql')

fs.mkdirSync('log')

const app = express()
MySQL.init((error, results, fields) => {
  if(error) fs.appendFileSync(
    './log/error.log',
    new Date() +
    '\n' + error + '\n' + JSON.stringify(error, null, 2) + '\n'
  )
  else fs.appendFileSync(
    './log/sqlStatus.log',
    new Date() +
    '\n' + results + '\n' + JSON.stringify(results, null, 2) +
    '\n' + fields + '\n' + JSON.stringify(fields, null, 2) + '\n'
  )
})

const r = function r(name) {
  return require('./private/router/' + name)
}

app.set('views', path.join(__dirname, 'private', 'layout'))
app.set('view engine', 'php')
app.engine('php', php.__express)

app.use(morgan('dev'))
app.use(cookieParser())
app.use(session({
  secret: 'Jorge es lo maximo',
  resave: true,
  saveUninitialized: true
}))
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({ extended: false }))

app.use('/', r('index'))
app.use('/sesion', r('sesion'))
app.use('/foro', r('foro'))

app.use(express.static('public'))

app.listen(3000, () => {
  console.log(`Servidor alojado en http://localhost:3000`)
})