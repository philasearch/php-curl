# A sample Guardfile
# More info at https://github.com/guard/guard#readme

guard 'phpunit2', :cli => '--colors', tests_path: 'tests' do

  watch(%r{^.+Test\.php$})

  #watch(%r{lib/RubyRainbows/Curl/(.+)\.php}) { |m| "tests/RubyRainbows/Curl/#{m[1]}Test.php" }
end