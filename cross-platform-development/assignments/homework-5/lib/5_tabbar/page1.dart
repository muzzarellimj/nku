import 'package:flutter/material.dart';

class Page1 extends StatelessWidget {
  const Page1({super.key});

  @override
  Widget build(BuildContext context) {
    return Center(
        child: Image.network(
            'https://www.nku.edu/content/www/_jcr_content/par/columncontrol_1906002490/column-1/columncontrol_1192591195/column-1/slideshow/image_1657096463.img.jpg/1738900578.jpg'));
  }
}
