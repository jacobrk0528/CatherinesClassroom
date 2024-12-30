<template>
  <div class="flex flex-col">
    <label for="datepicker" class="mb-2 text-gray-700 font-medium">{{ label }}</label>
    <input
          id="datepicker"
      type="date"
      class="border border-gray-300 rounded-md p-2 text-gray-700 focus:outline-none focus:ring focus:ring-blue-300"
      :value="formattedValue"
      @input="updateDate($event.target.value)"
    />
  </div>
</template>

<script>
export default {
  name: "DatePicker",
  props: {
    modelValue: {
      type: String,
      required: false,
      default: "",
    },
    label: {
      type: String,
      required: false,
    },
  },
  computed: {
    formattedValue() {
      return this.modelValue ? this.modelValue.slice(0, 10) : "";
    },
  },
  methods: {
    updateDate(value) {
      this.$emit("update:modelValue", value);
    },
  },
};
</script>

<style scoped>
input[type="date"]::-webkit-calendar-picker-indicator {
  filter: invert(0.5);
}
</style>
