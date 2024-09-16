<template>
  <Bar id="my-chart-id" :options="chartOptions" :data="chartData" />
</template>

  <script setup>
import { Bar } from "vue-chartjs";
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
} from "chart.js";
import { reactive } from "vue";

ChartJS.register(
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale
);

const props = defineProps({
  chartData: Object,
});

const chartOptions = reactive({
  responsive: true,
});
</script>
