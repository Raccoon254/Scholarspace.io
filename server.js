import express from 'express';
import { createServer } from 'node:http';
import { Server } from 'socket.io';

const app = express();
const server = createServer(app);
const io = new Server(server, {
    cors: {
        origin: '*',
    }
});

io.on('connection', (socket) => {
    socket.on('userConnected', (user) => {
        console.log(user['name'] + ' connected');
        //TODO! Set online status
    });

    socket.on('userDisconnected', (user) => {
        console.log(user['name'] + ' disconnected');
        //TODO! Set offline status
    });

    socket.on('typing', (data) => {
        //TODO! Data format must have the current user and the user that is being typed to
        //TODO! Set typing status
        console.log(data['from'] + ' is typing to ' + data['to']);
    });

    socket.on('sendMessage', (message) => {
        console.log(message);
        io.emit('receiveMessage', message);
    });
});

server.listen(3000, () => {
    console.log('Server running on port 3000');
});
