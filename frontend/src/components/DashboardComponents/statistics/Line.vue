<template>

  <LineWithLine :chartData="chartData" :chartOptions="chartOptions" :chartId="chartId" :width="width" :height="height"
    :cssClasses="cssClasses" :styles="styles" />
</template>
<script>


import { defineComponent, h, reactive } from 'vue'
import { generateChart } from 'vue-chartjs'
import axios from 'axios';
import { onMounted, ref } from 'vue';
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  LineController,
  LineElement,
  PointElement,
  CategoryScale,
  LinearScale,

} from 'chart.js'

ChartJS.register(
  Title,
  Tooltip,
  Legend,
  LineElement,
  PointElement,
  CategoryScale,
  LinearScale
)

class LineWithLineController extends LineController {
  draw() {
    super.draw()

    if (this.chart?.tooltip?.active) {
      const ctx = this.chart.ctx
      const x = this.chart.tooltip.x
      const topY = this.chart.scales['y-axis-0'].top
      const bottomY = this.chart.scales['y-axis-0'].bottom

      // draw line
      ctx.save()
      ctx.beginPath()
      ctx.moveTo(x, topY)
      ctx.lineTo(x, bottomY)
      ctx.lineWidth = 2
      ctx.strokeStyle = '#07C'
      ctx.stroke()
      ctx.restore()
    }
  }
}

const LineWithLine = generateChart(
  'line-with-chart',
  'line',
  LineWithLineController
)

export default defineComponent({
  name: 'CustomChart',
  components: {
    LineWithLine
  },
  // props: {
  //   chartId: {

  //     default: '-chart'
  //   },
  //   width: {

  //     default: 400
  //   },
  //   height: {

  //     default: 400
  //   },
  //   cssClasses: {
  //     default: '',

  //   },
  //   styles: {
  //     default: () => { }
  //   },

  // },

  setup(props) {
    let data = reactive([])
    let dataQ = reactive([])
    let dataT = reactive([])
    const getData = () => {
      axios.get("http://localhost/filrouge/backend/FactureController/getMontan").then(res => {
        data = res.data
        console.log("res");
        console.log(res);
        console.log("data");
        console.log(data);
        data.forEach(element => {
          // this.data.push({ j:element})


          let quantity = parseInt(element.total_quantity)
          dataQ.push(quantity)
          dataT.push(element.DateCreation)

        });
        // console.log("dataQ");
        console.log(dataQ);
        // dataQ.forEach(e=>console.log(e)) 
        console.log("dataT");
        console.log(dataT);

        // console.log(res.data[0].total_quantity)
      })
    }
    onMounted(() => {
      // getData()
      console.log("Line");
    })

    const chartData = {
      labels:
        // dataT,
        data =
      ['January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'],
      datasets: [
        {
          label: "data",
          backgroundColor: '#f87979',
          data:
            [507
              , 57
              , 594
              , 273
              , 259
              , 4501
              , 358
              , 264
              , 88
              , 188,
              93],

        }
      ]
    }

    const chartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      tooltips: {
        intersect: false
      }
    }

    return () =>
      h(LineWithLine, {
        chartData,
        data,
        dataQ,
        dataT,
        chartOptions,
        chartId: props.chartId,
        width: props.width,
        height: props.height,
        cssClasses: props.cssClasses,
        styles: props.styles,

      })
  }
})

</script>