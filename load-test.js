import http from 'k6/http';
import { check, sleep } from 'k6';

export const options = {
  stages: [
    { duration: '15s', target: 5 },   // Sube a 5 usuarios
    { duration: '30s', target: 20 },  // Mantiene 20 usuarios concurrentes
    { duration: '10s', target: 0 },   // Baja a 0
  ],
};

export default function () {
  let resHome = http.get('https://tienda-oi7f.onrender.com');
  check(resHome, { 'home status es 200': (r) => r.status === 200 });
  sleep(1);

  let resLogin = http.get('https://tienda-oi7f.onrender.com/login');
  check(resLogin, { 'login status es 200': (r) => r.status === 200 });
  sleep(2);
}