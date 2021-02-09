class TrendLine {   //Regression
  
    constructor(arrMonthIndex, arrGraphY) {
      this.a = null;
      this.b = null;

      this.arrMonthIndex = arrMonthIndex;
      this.trendLineYs = [];
    
      this.calculateRegression(arrMonthIndex, arrGraphY);
    }

    calculateRegression(arrMonthIndex, arrGraphY) {
        var averageMonthIndex = null;
        var averageY = null;
        
        //average Month 
        var sumMonthIndex = 0;
        for(var i = 0; i < arrMonthIndex.length; i++) {
            sumMonthIndex += i;
        }

        averageMonthIndex = sumMonthIndex/arrMonthIndex.length;

        //average Graph Y
        var sumY = 0;
        for(var i = 0; i < arrGraphY.length; i++) {
            sumY += arrGraphY[i];
        }

        averageY = sumY/arrGraphY.length;

        var xi_minus_x_multiply_yi_minus_y = [];
        var xix_multiply_xix = [];


        for(var i = 0; i < arrMonthIndex.length; i++) {
          var xix = (i) - averageMonthIndex;
          
          xix_multiply_xix.push(parseFloat((xix * xix).toFixed(2)));

          var yiy = arrGraphY[i] - averageY;

          xi_minus_x_multiply_yi_minus_y.push(parseFloat((xix * yiy).toFixed(2))); //round 2 
        }

        //calculate a 
        var sumXiXYiY = 0;
        for(var i = 0; i < arrMonthIndex.length; i++) {
          sumXiXYiY += xi_minus_x_multiply_yi_minus_y[i];
        }

        var sumXiXXiX = 0;
        for(var i = 0; i < arrMonthIndex.length; i++) {
          sumXiXXiX += xix_multiply_xix[i];
        }

        this.a = sumXiXYiY/sumXiXXiX;

        //calculate b
        this.b = averageY - this.a * averageMonthIndex;
        
    }


    getTrendlineYs() {
        this.trendLineYs = [];

        for(var i = 0; i < this.arrMonthIndex.length; i++)
            this.trendLineYs.push(parseFloat((this.a * (i) + this.b).toFixed(2)));

        return this.trendLineYs;
    }

    calc(x) {
        return parseFloat((this.a * x + this.b).toFixed(2));
    }

    getIntersectionWithXAxis() {
      //console.log("a: " + this.a + " , " + this.b + " result: " + (-this.b/this.a));

      //grade
      if(this.a >= 0) return null;

      return parseFloat(-this.b/this.a);

    }

    getA() {
      return this.a;
    }

    getB() {
      return this.b;
    }

}