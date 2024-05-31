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

// Store connected users and their socket IDs
const connectedUsers = new Map();

io.on('connection', (socket) => {

    socket.on('userConnected', (user) => {
        console.log(`${user.name} connected`);
        connectedUsers.set(socket.id, user);
        // Emit the list of connected users to all clients
        io.emit('connectedUsers', Array.from(connectedUsers.values()));
    });

    socket.on('userDisconnected', (user) => {
        console.log(`${user.name} disconnected`);
        connectedUsers.delete(socket.id);
        // Emit the list of connected users to all clients
        io.emit('connectedUsers', Array.from(connectedUsers.values()));
    });

    socket.on('typing', (data) => {
        const { from, to } = data;
        const recipient = Array.from(connectedUsers.values()).find(user => user.id === to);
        if (recipient) {
            const recipientSocketId = Array.from(connectedUsers.entries()).find(([_, user]) => user.id === to)[0];
            io.to(recipientSocketId).emit('typing', from);
        }
    });

    socket.on('stopTyping', (data) => {
        const { from, to } = data;
        const recipient = Array.from(connectedUsers.values()).find(user => user.id === to);
        if (recipient) {
            const recipientSocketId = Array.from(connectedUsers.entries()).find(([_, user]) => user.id === to)[0];
            io.to(recipientSocketId).emit('stopTyping', from);
        }
    });

    socket.on('sendMessage', (data) => {
        const { from, to, message } = data;
        const recipient = Array.from(connectedUsers.values()).find(user => user.id === to);
        if (recipient) {
            const recipientSocketId = Array.from(connectedUsers.entries()).find(([_, user]) => user.id === to)[0];
            io.to(recipientSocketId).emit('receiveMessage', { from, message });
        }
    });

    socket.on('disconnect', () => {
        console.log('A user disconnected');
        const user = connectedUsers.get(socket.id);
        if (user) {
            connectedUsers.delete(socket.id);
            io.emit('connectedUsers', Array.from(connectedUsers.values()));
        }
    });
});

server.listen(3000, () => {
    console.log('Server running on port 3000');
});
