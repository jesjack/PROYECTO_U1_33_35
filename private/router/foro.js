var express = require('express')
var router = express.Router()

router.get('/', (req, res, next) => {
  res.render('foro', {
    user: req.session['user']
  })
})
router.get('/matematicas', (req, res, next) => {
  res.render('foro', {
    user: req.session['user'],
    foro: 'matemáticas'
  })
})
router.get('/espa%C3%B1ol', (req, res, next) => {
  res.render('foro', {
    user: req.session['user'],
    foro: 'español'
  })
})
router.get('/ciencias', (req, res, next) => {
  res.render('foro', {
    user: req.session['user'],
    foro: 'ciencias'
  })
})

module.exports = router