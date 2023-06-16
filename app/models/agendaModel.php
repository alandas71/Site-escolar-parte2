<?php

class AgendaModel extends Model
{
    public function createEvent($title, $start, $end)
    {
        $stmt = $this->conn->prepare('INSERT INTO events (title, start, end) VALUES (?, ?, ?)');
        $stmt->execute([$title, $start, $end]);

        return true;
    }

    public function readEvents()
    {
        $stmt = $this->conn->query('SELECT * FROM events');
        $events = $stmt->fetchAll();

        return $events;
    }

    public function deleteEvent($id)
    {
        $stmt = $this->conn->prepare('DELETE FROM events WHERE id = ?');
        $stmt->execute([$id]);

        return true;
    }
}
