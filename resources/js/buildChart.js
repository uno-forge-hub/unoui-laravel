import ApexCharts from "apexcharts";

function getCssVar(varName) {
    return getComputedStyle(document.documentElement)
        .getPropertyValue(varName)
        .trim();
}

function buildTooltip(props, options) {
    const {
        title,
        valuePrefix = "$",
        isValueDivided = true,
        valuePostfix = "",
        hasTextLabel = false,
        invertGroup = false,
        labelDivider = "",
        wrapperClasses = "ms0.5 mb-2 shadow-sm bg-bg b b-border-light text-fg-subtitle rd-lg shadow-sm w40",
        wrapperExtClasses = "",
        seriesClasses = "text-xs",
        seriesExtClasses = "",
        titleClasses = "font-semibold text-sm! bg-bg! b-b px3 b-border! text-fg-subtitle rd-t-lg",
        titleExtClasses = "",
        markerClasses = "size-2.5! me-1.5! rd-full",
        markerExtClasses = "rd-xs!",
        valueClasses = "font-medium! text-fg-muted ms-auto!",
        valueExtClasses = "",
        labelClasses = "text-fg-muted",
        labelExtClasses = "",
    } = options;

    const { dataPointIndex } = props;
    const { colors } = props.ctx.opts;
    const series = props.ctx.opts.series;
    let seriesGroups = "";

    series.forEach((single, i) => {
        const val =
            props.series[i][dataPointIndex] ||
            (typeof series[i].data[dataPointIndex] !== "object"
                ? series[i].data[dataPointIndex]
                : props.series[i][dataPointIndex]);
        const label = series[i].name;
        const groupData = invertGroup
            ? {
                  left: `${hasTextLabel ? label : ""}${labelDivider}`,
                  right: `${valuePrefix}${
                      val >= 1000 && isValueDivided ? `${val / 1000}k` : val
                  }${valuePostfix}`,
              }
            : {
                  left: `${valuePrefix}${
                      val >= 1000 && isValueDivided ? `${val / 1000}k` : val
                  }${valuePostfix}`,
                  right: `${hasTextLabel ? label : ""}${labelDivider}`,
              };
        const labelMarkup = `<span class="apexcharts-tooltip-text-y-label ${labelClasses} ${labelExtClasses}">${groupData.left}</span>`;

        seriesGroups += `<div class="apexcharts-tooltip-series-group bg-bg b-transparent flex! ${
            hasTextLabel ? "justify-between!" : ""
        } order-${i + 1} ${seriesClasses} ${seriesExtClasses}">
        <span class="flex items-center">
          <span class="apexcharts-tooltip-marker ${markerClasses} ${markerExtClasses}" style="background: ${
            colors[i]
        }"></span>
          <div class="apexcharts-tooltip-text">
            <div class="apexcharts-tooltip-y-group py-0.5!">
              <span class="apexcharts-tooltip-text-y-value ${valueClasses} ${valueExtClasses}">${
            groupData.right
        }</span>
            </div>
          </div>
        </span>
        ${labelMarkup}
      </div>`;
    });

    return `<div class=" ${wrapperClasses} ${wrapperExtClasses}">
      <div class="apexcharts-tooltip-title ${titleClasses} ${titleExtClasses}">${title}</div>
      ${seriesGroups}
    </div>`;
}

document.addEventListener("alpine:init", () => {
    Alpine.data("apexChart", (config = {}) => ({
        chart: null,
        init() {
            const colors = [
                getCssVar("--chart-color-1"),
                getCssVar("--chart-color-2"),
            ];
            const opacityFrom =
                parseFloat(getCssVar("--gradient-opacity-from")) || 0.1;
            const opacityTo =
                parseFloat(getCssVar("--gradient-opacity-to")) || 0.8;

            // Store the chart element reference
            this.chartElement = this.$el;

            // Create chart configuration
            const chartConfig = {
                chart: {
                    height: config.height || 300,
                    type: config.type || "area",
                    toolbar: { show: false },
                    zoom: { enabled: false },
                    foreColor: getCssVar("--fg-muted"),
                },
                series: config.series || [],
                legend: { show: config.showLegend || false },
                dataLabels: { enabled: false },
                stroke: { curve: "smooth", width: 2 },
                grid: {
                    strokeDashArray:
                        parseInt(getCssVar("--chart-grid-dash-array")) || 2,
                    borderColor: getCssVar("--chart-grid-color"),
                    xaxis: {
                        lines: {
                            show: true,
                            color: getCssVar("--chart-grid-x-color"),
                        },
                    },
                    yaxis: {
                        lines: {
                            show: true,
                            color: getCssVar("--chart-grid-y-color"),
                        },
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        type: "vertical",
                        shadeIntensity: 1,
                        opacityFrom,
                        opacityTo,
                    },
                },
                xaxis: {
                    type: "category",
                    tickPlacement: "on",
                    categories: config.categories || [],
                    axisBorder: { show: false },
                    axisTicks: { show: false },
                    crosshairs: {
                        stroke: { dashArray: 0 },
                        dropShadow: { show: false },
                    },
                    tooltip: { enabled: false },
                    labels: {
                        style: {
                            colors: "#9ca3af",
                            fontSize: "13px",
                            fontFamily: "Inter, ui-sans-serif",
                            fontWeight: 400,
                        },
                        formatter:
                            config.xFormatter ||
                            ((title) => {
                                let t = title;
                                if (t) {
                                    const newT = t.split(" ");
                                    t = `${newT[0]} ${
                                        newT[1]?.slice(0, 3) || ""
                                    }`;
                                }
                                return t;
                            }),
                    },
                },
                yaxis: {
                    labels: {
                        align: "left",
                        style: {
                            colors: "#9ca3af",
                            fontSize: "13px",
                            fontFamily: "Inter, ui-sans-serif",
                            fontWeight: 400,
                        },
                        formatter:
                            config.yFormatter ||
                            ((value) =>
                                value >= 1000 ? `${value / 1000}k` : value),
                    },
                },
                tooltip: {
                    x: { format: "MMMM yyyy" },
                    y: {
                        formatter: (value) =>
                            `$${value >= 1000 ? `${value / 1000}k` : value}`,
                    },
                    custom: function (props) {
                        const { categories } = props.ctx.opts.xaxis;
                        const { dataPointIndex } = props;
                        const title = categories[dataPointIndex].split(" ");
                        const newTitle = `${title[0]} ${title[1] || ""}`;
                        return buildTooltip(props, {
                            title: newTitle,
                            hasTextLabel: true,
                            wrapperExtClasses: "min-w-28",
                            labelDivider: ":",
                            labelExtClasses: "ms-2",
                        });
                    },
                },
                colors,
                responsive: [
                    {
                        breakpoint: 568,
                        options: {
                            chart: { height: 300 },
                            labels: {
                                style: {
                                    colors: "#9ca3af",
                                    fontSize: "11px",
                                    fontFamily: "Inter, ui-sans-serif",
                                    fontWeight: 400,
                                },
                                offsetX: -2,
                                formatter: (title) => title.slice(0, 3),
                            },
                            yaxis: {
                                labels: {
                                    align: "left",
                                    style: {
                                        colors: "#9ca3af",
                                        fontSize: "11px",
                                        fontFamily: "Inter, ui-sans-serif",
                                        fontWeight: 400,
                                    },
                                    formatter: (value) =>
                                        value >= 1000
                                            ? `${value / 1000}k`
                                            : value,
                                },
                            },
                        },
                    },
                ],
            };

            this.chartConfig = chartConfig;

            this.chart = new ApexCharts(this.$el, chartConfig);
            this.chart.render();

            window.addEventListener(
                "theme-changed",
                this.handleThemeChange.bind(this)
            );
            document.addEventListener(
                "livewire:navigated",
                this.handleThemeChange.bind(this)
            );
        },

        handleThemeChange() {
            if (this.chart) {
                this.chart.destroy();
                this.chartConfig.colors = [
                    getCssVar("--chart-color-1"),
                    getCssVar("--chart-color-2"),
                ];

                this.chartConfig.fill.gradient.opacityFrom =
                    parseFloat(getCssVar("--gradient-opacity-from")) || 0.1;
                this.chartConfig.fill.gradient.opacityTo =
                    parseFloat(getCssVar("--gradient-opacity-to")) || 0.8;

                this.chartConfig.grid.borderColor =
                    getCssVar("--chart-grid-color");
                this.chartConfig.grid.strokeDashArray =
                    parseInt(getCssVar("--chart-grid-dash-array")) || 2;
                this.chartConfig.grid.xaxis.lines.color =
                    getCssVar("--chart-grid-x-color") ||
                    getCssVar("--chart-grid-color");
                this.chartConfig.grid.yaxis.lines.color =
                    getCssVar("--chart-grid-y-color") ||
                    getCssVar("--chart-grid-color");

                this.chartConfig.chart.foreColor = getCssVar("--fg-muted");

                this.chart = new ApexCharts(
                    this.chartElement,
                    this.chartConfig
                );
                this.chart.render();
            }
        },

        updateSeries(newSeries) {
            if (this.chart) {
                this.chart.updateSeries(newSeries);
            }
        },

        updateOptions(newOptions) {
            if (this.chart) {
                this.chart.updateOptions(newOptions);
            }
        },
    }));
});
