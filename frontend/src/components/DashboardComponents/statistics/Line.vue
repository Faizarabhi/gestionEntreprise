<template>
<LineWithLine :chartData="chartData"
:chartOptions="chartOptions"
:chartId="chartId"
:width="width"
:height="height"
:cssClasses="cssClasses"
:styles="styles"/>
</template>
<script>


import { defineComponent, h } from 'vue'

import { generateChart } from 'vue-chartjs'
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
  props: {
    chartId: {
      
      default: '-chart'
    },
    width: {
      
      default: 400
    },
    height: {
      
      default: 400
    },
    cssClasses: {
      default: '',
      
    },
    styles: {
      default: () => {}
    },
    
  },
  setup(props) {
    const chartData = {
      labels: ['January',
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
          label: 'Data One',
          backgroundColor: '#f87979',
          data: [40, 39, 10, 40, 39, 80,40, 39, 10, 40, 39, 80]
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