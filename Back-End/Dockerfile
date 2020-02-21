# Author: Freddy Roa-Familia
# Version: 1.0

FROM python:3.7-alpine3.10
RUN python -m pip install pika --upgrade &&\
    mkdir c:\home\send
ENV PYTHONUNBUFFERED=1
# Creates directory 'helloworld' in container
# RUN mkdir c:\home\helloworld
# Copies 'helloworld.py' from local directory into the containers helloworld folder
COPY send.py /home/send/
# Runs 'helloworld.py' in the container
CMD ["python","/home/send/send.py"]