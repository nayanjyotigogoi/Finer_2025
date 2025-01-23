<style>


    /* Past Presidents Style */

.past-presidents-section {
    overflow-x: hidden;
    background: #fff;
    position: relative;
}

.past-presidents-section::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}

/* Background Shapes */
.past-presidents-shape {
    position: absolute;
    border-radius: 100%;
    z-index: -1;
}

.past-presidents-shape-1 {
    width: 400px;
    height: 400px;
    border: 40px solid rgba(255, 165, 0, 0.1);
    top: -250px;
    left: -200px;
}

.past-presidents-shape-2 {
    width: 300px;
    height: 300px;
    border: 30px solid rgba(255, 165, 0, 0.1);
    bottom: -1px;
    right: -150px;
}

.past-presidents-container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 40px 20px;
    text-align: center;
}

.past-presidents-section-title {
    color: #FFA500;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
}

.past-presidents-main-title {
    color: #1a1a4b;
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 20px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.past-presidents-description {
    color: #666;
    max-width: 800px;
    margin: 0 auto 40px;
    line-height: 1.6;
}

.past-presidents-carousel {
    position: flex;
    padding: 100px 50px;
    height: 500px;
    overflow: hidden;
}

.past-presidents-carousel-container {
    display: flex;
    margin-top: 60px;
    transition: transform 0.5s ease;
    gap: 80px;
    position: relative;
}

.past-presidents-card {
    flex: 0 0 30%; /* Show 3 items */
    max-width: 300px;
    border: 2px solid #FFA500;
    border-radius: 5px;
    padding: 20px;
    position: relative;
    transition: all 0.5s ease;
    transform: scale(0.8);
    opacity: 0.7;
    background: white;
    margin-bottom: 50px;
}

.past-presidents-card.active {
    transform: scale(1.1);
    opacity: 1;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.past-presidents-profile-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin: -80px auto 20px;
    border: 2px solid #FFA500;
    object-fit: cover;
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
}

.past-presidents-card-title {
    color: #1a1a4b;
    font-size: 18px;
    margin-top: 50px;
    margin-bottom: 10px;
}

.past-presidents-card-subtitle {
    color: #666;
    font-size: 14px;
    margin-bottom: 15px;
}

.past-presidents-card-description {
    color: #444;
    font-size: 14px;
    line-height: 1.5;
}

.past-presidents-nav-button {
    position: absolute;
    top: 60%;
    transform: translateY(-50%);
    background: #FFA500;
    border: none;
    color: white;
    width: 40px;
    height: 40px;
    cursor: pointer;
    border-radius: 50%;
    font-size: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s ease;
    z-index: 2;
}

.past-presidents-nav-button:hover {
    background: #ff8c00;
}

.past-presidents-prev {
    left: 50px;
}

.past-presidents-next {
    right: 50px;
}

.past-presidents-dots {
    display: flex;
    justify-content: center;
    margin-top: 40px;
    gap: 8px;
}

.past-presidents-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #ddd;
    cursor: pointer;
    transition: background 0.3s ease;
}

.past-presidents-dot.active {
    background: #FFA500;
}


@keyframes slideInLeft {
    from {
        transform: translateX(100%) scale(0.8);
        opacity: 0;
    }
    to {
        transform: translateX(0) scale(0.8);
        opacity: 0.7;
    }
}

@keyframes slideInRight {
    from {
        transform: translateX(-100%) scale(0.8);
        opacity: 0;
    }
    to {
        transform: translateX(0) scale(0.8);
        opacity: 0.7;
    }
}

@keyframes slideOutLeft {
    from {
        transform: translateX(0) scale(0.8);
        opacity: 0.7;
    }
    to {
        transform: translateX(-100%) scale(0.8);
        opacity: 0;
    }
}

@keyframes slideOutRight {
    from {
        transform: translateX(0) scale(0.8);
        opacity: 0.7;
    }
    to {
        transform: translateX(100%) scale(0.8);
        opacity: 0;
    }
}

.slide-in-left {
    animation: slideInLeft 0.5s forwards;
}

.slide-in-right {
    animation: slideInRight 0.5s forwards;
}

.slide-out-left {
    animation: slideOutLeft 0.5s forwards;
}

.slide-out-right {
    animation: slideOutRight 0.5s forwards;
}

/* Media Queries for Responsiveness */
@media (max-width: 1000px) {
    .past-presidents-carousel {
        max-width: 700px;
    }
    .past-presidents-card {
        flex: 0 0 250px;
        max-width: 250px;
    }
}

@media (max-width: 768px) {
    .past-presidents-carousel {
        max-width: 300px;
    }
    .past-presidents-card {
        flex: 0 0 260px;
        max-width: 260px;
        margin: 0 10px;
    }
}


</style>