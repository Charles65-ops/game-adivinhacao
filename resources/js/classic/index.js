// Cria canvas de partículas
const canvas = document.createElement('canvas');
canvas.id = 'particles';
document.body.appendChild(canvas);
const ctx = canvas.getContext('2d');

let width = canvas.width = window.innerWidth;
let height = canvas.height = window.innerHeight;

window.addEventListener('resize', () => {
    width = canvas.width = window.innerWidth;
    height = canvas.height = window.innerHeight;
});

// Cria partículas neon
const particles = [];
const colors = ['#ff0066', '#00ffcc', '#ffcc00', '#ff33aa', '#00ffff'];

for (let i = 0; i < 80; i++) {
    particles.push({
        x: Math.random() * width,
        y: Math.random() * height,
        radius: Math.random() * 3 + 1,
        color: colors[Math.floor(Math.random() * colors.length)],
        dx: (Math.random() - 0.5) * 0.5,
        dy: (Math.random() - 0.5) * 0.5
    });
}

// Função de desenho e animação
function draw() {
    ctx.clearRect(0, 0, width, height);
    particles.forEach(p => {
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.radius, 0, Math.PI * 2);
        ctx.fillStyle = p.color;
        ctx.shadowColor = p.color;
        ctx.shadowBlur = 10;
        ctx.fill();

        p.x += p.dx;
        p.y += p.dy;

        if (p.x < 0 || p.x > width) p.dx *= -1;
        if (p.y < 0 || p.y > height) p.dy *= -1;
    });

    requestAnimationFrame(draw);
}

draw();
document.getElementById('guess-button').addEventListener('click', () => {
    alert('Função Adivinhar ainda não implementada!');
});

document.getElementById('select-button').addEventListener('click', () => {
    alert('Função Select Imagem ainda não implementada!');
});
