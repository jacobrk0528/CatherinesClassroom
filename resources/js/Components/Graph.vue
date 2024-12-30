<template>
    <div class="relative w-full h-full">
        <canvas id="myChart"></canvas>
    </div>
</template>

<script>
export default {
    props: {
        data: {
            type: Array,
            required: true,
        },
        title: {
            type: String,
            required: true,
        },
    },
    mounted() {
        const ctx = document.getElementById("myChart").getContext("2d");

        new Chart(ctx, {
            type: "line",
            data: {
                labels: this.data.map((item) => `${item.hour}:00`),
                datasets: [
                    {
                        label: this.title,
                        backgroundColor: "#42A5F5",
                        borderColor: "#1E88E5",
                        data: this.data.map((item) => item.order_count),
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: function (value) {
                                return Number.isInteger(value) ? value : "";
                            },
                        },
                    },
                },
            },
        });
    },
};
</script>

