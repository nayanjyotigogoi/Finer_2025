const canvas = document.getElementById('sectorsCanvas');
const ctx = canvas.getContext('2d');

canvas.width = 500;
canvas.height = 500;

function drawSectorsDiagram() {
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const radius = Math.min(canvas.width, canvas.height) * 0.4;

    const sectors = [
        { color: '#ff9800', label: 'Tourism' },
        { color: '#2196f3', label: 'IT' },
        { color: '#4caf50', label: 'Health' },
        { color: '#f44336', label: 'Education' },
        { color: '#9c27b0', label: 'Infrastructure' },
        { color: '#795548', label: 'Manufacturing' },
        { color: '#607d8b', label: 'Agriculture' },
        { color: '#ff5722', label: 'Services' }
    ];

    const sectorAngle = (2 * Math.PI) / sectors.length;

    sectors.forEach((sector, index) => {
        const startAngle = index * sectorAngle;
        const endAngle = startAngle + sectorAngle;

        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
        ctx.closePath();
        ctx.fillStyle = sector.color;
        ctx.fill();
        ctx.strokeStyle = '#fff';
        ctx.lineWidth = 2;
        ctx.stroke();

        const labelRadius = radius * 0.7;
        const labelAngle = startAngle + sectorAngle / 2;
        const labelX = centerX + Math.cos(labelAngle) * labelRadius;
        const labelY = centerY + Math.sin(labelAngle) * labelRadius;

        ctx.save();
        ctx.translate(labelX, labelY);
        ctx.rotate(labelAngle + Math.PI / 2);
        ctx.fillStyle = '#fff';
        ctx.font = '12px Arial';
        ctx.textAlign = 'center';
        ctx.textBaseline = 'middle';
        ctx.fillText(sector.label, 0, 0);
        ctx.restore();
    });

    ctx.beginPath();
    ctx.arc(centerX, centerY, radius * 0.3, 0, 2 * Math.PI);
    ctx.fillStyle = '#1a237e';
    ctx.fill();

    ctx.fillStyle = '#ffffff';
    ctx.font = 'bold 20px Arial';
    ctx.textAlign = 'center';
    ctx.textBaseline = 'middle';
    ctx.fillText('SECTORS', centerX, centerY);
}

drawSectorsDiagram();