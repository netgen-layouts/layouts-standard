const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');

let shouldClean = true;
const webpackConfig = (config = {}) => {
  const appName = config.appName || 'app';
  const styleName = config.styleName || 'style';
  return (env, argv) => {
    const plugins = [
      new MiniCssExtractPlugin({
        filename: `css/${styleName}.css`,
      }),
      new CleanWebpackPlugin({
        // We cleanup the superfluous js/grid.js since we don't build JavaScript modules for grid.css
        cleanOnceBeforeBuildPatterns: [], // Disables cleanOnceBeforeBuildPatterns since it's specified on its own below
        cleanAfterEveryBuildPatterns: ['js/grid.js'],
      }),
    ];
    if (shouldClean) {
      plugins.push(new CleanWebpackPlugin({
        cleanOnceBeforeBuildPatterns: ['**/*', '!images', '!dev', '!images/**', '!dev/**'],
      }));
      shouldClean = false;
    }

    const isEnvDevelopment = argv.mode === 'development';
    const isEnvProduction = argv.mode === 'production';

    const resourcesPath = './bundle/Resources';
    const buildPath = isEnvProduction ? 'public' : 'public/dev';

    const getStyleLoaders = (cssOptions, preProcessor) => {
      const loaders = [
        isEnvDevelopment && require.resolve('style-loader'),
        {
          loader: MiniCssExtractPlugin.loader,
          options: {
            publicPath: '../',
            sourceMap: isEnvDevelopment,
          },
        },
        {
          loader: require.resolve('css-loader'),
          options: cssOptions,
        },
        {
          loader: require.resolve('postcss-loader'),
          options: {
            ident: 'postcss',
            plugins: () => [
              require('postcss-flexbugs-fixes'),
              require('postcss-preset-env')({
                autoprefixer: {
                  flexbox: 'no-2009',
                },
                stage: 3,
              }),
            ],
            sourceMap: isEnvDevelopment,
          },
        },
      ].filter(Boolean);
      if (preProcessor) {
        loaders.push({
          loader: require.resolve(preProcessor),
          options: {
            sourceMap: isEnvDevelopment,
          },
        });
      }
      return loaders;
    };

    return {
      entry: `${resourcesPath}/es6/${appName}.js`,
      output: {
        filename: `js/${appName}.js`,
        path: path.resolve(__dirname, `${resourcesPath}/${buildPath}`),
      },
      devtool: isEnvDevelopment ? 'cheap-module-source-map' : '',
      resolve: {
        symlinks: false,
      },
      module: {
        rules: [
          // First, run the linter.
          // It's important to do this before Babel processes the JS.
          {
            test: /\.(js|mjs|jsx)$/,
            enforce: 'pre',
            use: [
              {
                options: {
                  eslintPath: require.resolve('eslint'),
                },
                loader: require.resolve('eslint-loader'),
              },
            ],
            exclude: /node_modules/,
          },
          {
            oneOf: [
              {
                test: [/\.bmp$/, /\.gif$/, /\.jpe?g$/, /\.png$/],
                loader: require.resolve('url-loader'),
                options: {
                  limit: 10000,
                  name: 'images/[name].[ext]',
                },
              },
              {
                test: /\.(js|mjs|jsx)$/,
                loader: require.resolve('babel-loader'),
                options: {
                  cacheDirectory: true,
                  cacheCompression: isEnvProduction,
                  compact: isEnvProduction,
                },
              },
              {
                test: /\.css$/,
                use: getStyleLoaders({
                  importLoaders: 1,
                  sourceMap: isEnvDevelopment,
                }),
                sideEffects: true,
              },
              {
                test: /\.(scss|sass)$/,
                use: getStyleLoaders(
                  {
                    importLoaders: 2,
                    sourceMap: isEnvDevelopment,
                  },
                  'sass-loader'
                ),
                sideEffects: true,
              },
              {
                loader: require.resolve('file-loader'),
                exclude: [/\.(js|mjs|jsx|ts|tsx)$/, /\.html$/, /\.json$/],
                options: {
                  name: 'media/[name].[ext]',
                },
              },
            ],
          },
        ],
      },
      optimization: {
        minimizer: [
          new TerserPlugin({
            extractComments: false,
            terserOptions: {
              output: {
                comments: false,
              },
            },
          }),
          new OptimizeCssAssetsPlugin({
            cssProcessor: require('cssnano'),
            cssProcessorPluginOptions: {
              preset: ['default', { discardComments: { removeAll: true } }],
            },
            canPrint: true,
          }),
        ],
      },
      plugins,
    };
  };
};

const config = webpackConfig({
  appName: 'app',
  styleName: 'style',
});
const configFull = webpackConfig({
  appName: 'app-full',
  styleName: 'style-full',
});
const gridStyle = webpackConfig({
  appName: 'grid',
  styleName: 'grid',
});

module.exports = [config, configFull, gridStyle];
