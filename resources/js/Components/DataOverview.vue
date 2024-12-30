<template>
    <div class="flex flex-col justify-center align-middle max-w-36 w-full mx-4 border-2 border-black">
        <div class="flex justify-center border-b-2 border-black">
            <h3 class="text-xl px-2 py-1">{{title}}:</h3>
        </div>
        <div class="flex justify-center">
            <p class="text-2xl py-4">{{formatValue(value, money)}}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            required: true
        },
        value: {
            type: Number,
            required: true
        },
        money: {
            type: Boolean,
            required: false
        }
    },
    methods: {
        formatValue(value, isMoney) {
            if (isMoney) {
                const formattedValue = new Intl.NumberFormat('en-us', {
                    style: "currency",
                    currency: "USD"
                }).format(value);
                return formattedValue;
            } else {
                return value;
            }
        }
    }
}
</script>
