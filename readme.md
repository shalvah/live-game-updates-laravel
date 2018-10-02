# live-game-updates-laravel

Realtime app for following sports game scores and events in realtime. This app provides a backend for an admin to log in and publish updates on ongoing games, and a frontend that allows users to follow a game's progress in realtime.

View tutorial [here]()

## Prerequisites
- PHP >= 7.1.3
- Composer
- A [Pusher account](https://pusher.com/signup) and [Pusher app credentials](http://dashboard.pusher.com/)

## Getting started
Clone the project and install dependencies:

```bash
git clone https://github.com/shalvah/live-game-updates-laravel
cd live-game-updates-laravel
composer install
```

Copy the `.env.example` file to a `.env` file. Add your Pusher app credentials to this file:
```
PUSHER_APP_ID=your-app-id
PUSHER_APP_KEY=your-app-key
PUSHER_APP_SECRET=your-app-secret
PUSHER_APP_CLUSTER=your-app-cluster
```

## Built With

* [Pusher](https://pusher.com/) - APIs to enable devs building realtime features
* [Laravel](https://laravel.com)
* [Vue.js](https://vuejs.org)
