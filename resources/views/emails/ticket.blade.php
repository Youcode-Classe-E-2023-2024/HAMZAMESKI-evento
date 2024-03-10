<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
</head>
<body>
<div class="ticket">
    <div class="ticket-header">
        <h1 class="ticket-title">SOUR Prom</h1>
        <h2 class="ticket-subtitle">Olivia Rodrigo</h2>
    </div>
    <div class="ticket-body">
        <p class="ticket-info"><strong>Date:</strong> {{ $event->date }}</p>
        <p class="ticket-info"><strong>Event:</strong> {{ $event->name }} </p>
        <p class="ticket-info"><strong>Location:</strong> {{ $event->place }} </p>
        <p class="ticket-info"><strong>Full Name:</strong> {{ auth()->user()->name }} </p>
        <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb" alt="QR code" style="max-width: 100%; height: auto; margin-top: 20px;">
    </div>
</div>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        padding: 20px;
    }

    .ticket {
        max-width: 400px;
        margin: 0 auto;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .ticket-header {
        text-align: center;
        margin-bottom: 20px;
    }

    .ticket-title {
        font-size: 24px;
        color: #333;
    }

    .ticket-subtitle {
        font-size: 18px;
        color: #666;
    }

    .ticket-body {
        border-top: 1px solid #ddd;
        padding-top: 20px;
    }

    .ticket-info {
        margin-bottom: 10px;
    }

    .ticket-info strong {
        font-weight: bold;
    }
</style>
</body>
</html>
