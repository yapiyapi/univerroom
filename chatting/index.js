const app = require('express')();
const http = require('http').Server(app);
const io = require('socket.io')(http, { cors: { origin: "*" } });
const port =  3000;

const { chat4 } = require('./models/index.js');

// -----------------------------------

app.get('/', (req, res) => {
  var ChatRoom_seq = req.query['ChatRoom_seq'];
  res.sendFile(__dirname + '/index.html');
});

io.on('connection', (socket) => {
  // message receives
  socket.on('msg', msg => {
    io.emit('msg', `${JSON.parse(msg).name} : ${JSON.parse(msg).msg}`);

    // sequelize CREATE
    chat4.create({
      ChatRoom_seq: JSON.parse(msg).ChatRoom_seq,
      userID: JSON.parse(msg).id,
      msg: JSON.parse(msg).msg,
      add_date: new Date(),
    });
  });

});

http.listen(port, () => {
  console.log(`Socket.IO server running at http://localhost:${port}/`);
});