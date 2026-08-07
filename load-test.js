import http from 'k6/http';
import { sleep } from 'k6';

export const options = {
  stages: [
    { duration: '10s', target: 2 }, // Solo 2 usuarios para depurar rápido
  ],
};

export default function () {
  let resHome = http.get('https://tienda-oi7f.onrender.com');
  console.log(`--- HOME STATUS: ${resHome.status} ---`);

  let resLogin = http.get('https://tienda-oi7f.onrender.com/login');
  console.log(`--- LOGIN STATUS: ${resLogin.status} ---`);

  sleep(1);
}
