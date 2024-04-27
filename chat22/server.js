const express = require('express');
const http = require('http');
const socketIo = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

app.use(express.static('public'));

// Store admin sockets separately
let adminSocket;

// Handle user connections
io.on('connection', (socket) => {
    console.log('A user connected');
    
    socket.on('message', (message) => {
        console.log('Message received from user:', message);
        // Handle the message as needed
    });

    socket.on('disconnect', () => {
        console.log('A user disconnected');
    });
});

// Handle admin connections
io.of('/admin').on('connection', (socket) => {
    console.log('An admin connected');
    
    socket.on('message', (message) => {
        console.log('Message received from admin:', message);
        // Handle the message as needed
    });

    socket.on('disconnect', () => {
        console.log('An admin disconnected');
    });
});

const PORT = process.env.PORT || 3000;
server.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
